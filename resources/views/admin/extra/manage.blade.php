@extends('admin.master')
@section('title')
    Blog Extra
@endsection

@section('content')

    <section class="py-5">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Blog Extra</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Blog Extra</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-muted">{{session('message')}}</p>

        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable" style="width:100%">
                        <thead>
                        <tr>
                            <th> SL </th>
                            <th> Blog ID </th>
                            <th> Blog Extra ID </th>
                            <th> Blog Extra Title </th>
                            <th> Blog Extra Image </th>
                            <th> Status </th>
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($extras as $extra)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$extra->blog_id}}</td>
                                <td>{{$extra->id}}</td>
                                <td>{{$extra->title}}</td>
                                <td>
                                    <img src="{{ asset( $extra->image ) }}" alt="{{ $extra->alt }}" height="60" />
                                </td>
                                <td>
                                    @if($extra->status == 'active')
                                        <a href="{{ route('change.status.extra', $extra->id) }}" class="btn btn-success">Active</a>
                                    @else($extra->status == 'inactive')
                                        <a href="{{ route('change.status.extra', $extra->id) }}" class="btn btn-danger">InActive</a>
                                    @endif
                                </td>
                                <td>
                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                        <a href="{{route('extra.show', Crypt::encryptString($extra->id))}}" class="text-primary mx-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Views"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('extra.edit', Crypt::encryptString($extra->id))}}" class="text-warning mx-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('extra.destroy', $extra->id )}}" method="post" onclick="return confirm('Are you sure to delete this extra blog?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-danger border-0" type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>

@endsection


