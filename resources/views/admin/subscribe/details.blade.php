@extends('admin.master')

@section('title')
    Subscribe Email Details
@endsection

@section('content')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header fs-3 fw-bold"> Subscribe Email Details Page</div>
                        <p class="text-success text-center">{{session('message')}}</p>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th> Subscribe ID </th>
                                    <td> {{$subscribe->id}} </td>
                                </tr>
                                <tr>
                                    <th>  Subscribe Create Date & Time </th>
                                    <td>
                                        {{ $subscribe->created_at->setTimezone('Asia/Dhaka')->format('M d, Y, h:ia') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th> User Name </th>
                                    <td>
                                        @if ($subscribe && $subscribe->user)
                                            {{$subscribe->user->name}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th> User Email </th>
                                    <td>
                                        @if ($subscribe && $subscribe->user)
                                            {{$subscribe->user->email}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th> Subscribe Email </th>
                                    <td> {{$subscribe->email}} </td>
                                </tr>
                                <tr>
                                    <th> Status </th>
                                    <td>
                                        @if($subscribe->status == 'Read')
                                            <a href="{{route('status.subscribe', $subscribe->id)}}" onclick="return confirm('Are you sure to change status?')" class="btn btn-success btn-sm">Read</a>
                                        @elseif($subscribe->status == 'unRead')
                                            <a href="{{route('status.subscribe', $subscribe->id)}}" onclick="return confirm('Are you sure to change status?')" class="btn btn-primary btn-sm">UnRead</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Action</th>
                                    <td>
                                        <div class="d-flex">
                                            <form action="{{ route('subscribe.destroy', $subscribe->id )}}" method="post" onclick="return confirm('Are you sure to delete this subscribe?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-danger border-0" type="submit"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
