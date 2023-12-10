@extends('admin.master')
@section('title')
    Blogs
@endsection

@section('content')

    <section class="py-5">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Blog</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Blog</li>
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
                            <th> Blog Name </th>
                            <th> Total View </th>
                            <th> Home Status </th>
                            <th> Popular Status </th>
                            <th> Blog Status </th>
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blogs as $blog)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$blog->id}}</td>
                                <td>{{$blog->heading}}</td>
                                <td>
                                    @if(!empty($blog->count))
                                    {{$blog->count}}
                                    @else
                                    0
                                    @endif
                                </td>
                                <td>
                                    @if($blog->home_status == 'active')
                                        <a href="{{ route('change.status.home.blog', $blog->id) }}" class="btn btn-success">Active</a>
                                    @else($blog->home_status == 'inActive')
                                        <a href="{{ route('change.status.home.blog', $blog->id) }}" class="btn btn-danger">InActive</a>
                                    @endif
                                </td>
                                <td>
                                    @if($blog->popular_status == 'active')
                                        <a href="{{ route('change.status.popular.blog', $blog->id) }}" class="btn btn-success">Active</a>
                                    @else($blog->popular_status == 'inActive')
                                        <a href="{{ route('change.status.popular.blog', $blog->id) }}" class="btn btn-danger">InActive</a>
                                    @endif
                                </td>
                                <td>
                                    @if($blog->blog_status == 1)
                                        <a href="{{ route('change.status.blog', $blog->id) }}" class="btn btn-success">Active</a>
                                    @else($blog->blog_status == 0)
                                        <a href="{{ route('change.status.blog', $blog->id) }}" class="btn btn-danger">InActive</a>
                                    @endif
                                </td>
                                <td>
                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                        <a href="{{route('blog.show', Crypt::encryptString($blog->id))}}" class="text-primary mx-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Views"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('blog.edit', Crypt::encryptString($blog->id))}}" class="text-warning mx-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('blog.destroy', $blog->id )}}" method="post" onclick="return confirm('Are you sure to delete this blog?')">
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


