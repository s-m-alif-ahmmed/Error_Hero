@extends('admin.master')

@section('title')
    User Detail
@endsection

@section('content')

    <section class="mt-3 py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">User Detail Page</div>
                        <p class="text-success text-center">{{session('message')}}</p>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>User ID</th>
                                    <td>{{$user->id}}</td>
                                </tr>
                                <tr>
                                    <th> Name</th>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <th>User Email</th>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <th>User Role</th>
                                    <td>{{$user->role == 'admin' ? 'Admin' : 'User'}}</td>
                                </tr>
                                <tr>
                                    <th>User Role Action</th>
                                    <td>
                                        @if($user->role == 'admin')
                                            <a href="{{route('change.role',['id' => $user->id])}}" onclick="return confirm('Are you sure to change role?')" class="btn btn-success btn-sm">Admin</a>
                                        @elseif($user->role == 'user')
                                            <a href="{{route('change.role',['id' => $user->id])}}" onclick="return confirm('Are you sure to change role?')" class="btn btn-success btn-sm">User</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>User Ban Action</th>
                                    <td>
                                        @if($user->ban_status == 1)
                                            <a href="{{route('change.ban.status',['id' => $user->id])}}" onclick="return confirm('Are you sure to unban this user?')" class="btn btn-danger btn-sm">Ban</a>
                                        @elseif($user->ban_status == 0)
                                            <a href="{{route('change.ban.status',['id' => $user->id])}}" onclick="return confirm('Are you sure to ban this user?')" class="btn btn-success btn-sm">UnBan</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Action</th>
                                    <td>
                                        <form action="{{ route('delete.user', ['id' => $user->id]) }}" onclick="return confirm('Are you sure to delete this user?')" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
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
