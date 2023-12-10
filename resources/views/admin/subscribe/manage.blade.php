@extends('admin.master')

@section('title')
    Subscribe Manage
@endsection

@section('content')

    <section class="py-5">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"> Subscribe </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Subscribe </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-muted">{{session('message')}}</p>

        {{--        manage home content--}}
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th> SL </th>
                            <th> Subscribe Date & Time </th>
                            <th> User Name </th>
                            <th> Subscribe Email </th>
                            <th> Status </th>
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subscribes as $subscribe)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $subscribe->created_at->setTimezone('Asia/Dhaka')->format('M d, Y, h:ia') }}</td>
                                <td>
                                    @if ($subscribe && $subscribe->user)
                                        {{$subscribe->user->name}}
                                    @endif
                                </td>
                                <td>{{$subscribe->email}}</td>
                                <td>
                                    @if($subscribe->status == 'Read')
                                        <a href="{{route('status.subscribe', $subscribe->id)}}" onclick="return confirm('Are you sure to change status?')" class="btn btn-success btn-sm">Read</a>
                                    @elseif($subscribe->status == 'unRead')
                                        <a href="{{route('status.subscribe', $subscribe->id)}}" onclick="return confirm('Are you sure to change status?')" class="btn btn-primary btn-sm">UnRead</a>
                                    @endif
                                </td>

                                <td>
                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                        <a href="{{route('subscribe.show', Crypt::encryptString($subscribe->id))}}" class="text-primary mx-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Views"><i class="fa fa-eye"></i></a>
                                        <form action="{{ route('subscribe.destroy', $subscribe->id )}}" method="post" onclick="return confirm('Are you sure to delete this subscribe?')">
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


