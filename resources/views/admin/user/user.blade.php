@extends('admin.master')
@section('title')
    Users
@endsection

@section('content')

    <section class="py-5">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-md-10 mx-auto">
                    <div class="card card-body">
                        <h1 class="text-muted fw-bold">Users</h1>
                        <p class="text-success text-center">{{session('message')}}</p>
                        <hr/>
                        <table class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th> User ID </th>
                                <th> Name</th>
                                <th> Email </th>
                                <th> Role </th>
                                <th> Ban/UnBan </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if($user->role == 'admin')
                                            <a href="{{route('change.role', $user->id )}}" onclick="return confirm('Are you sure to change role?')" class="btn btn-success btn-sm">Admin</a>
                                        @elseif($user->role == 'user')
                                            <a href="{{route('change.role', $user->id )}}" onclick="return confirm('Are you sure to change role?')" class="btn btn-success btn-sm">User</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->ban_status == 1)
                                            <a href="{{route('change.ban.status', $user->id )}}" onclick="return confirm('Are you sure to unban this user?')" class="btn btn-danger btn-sm">Ban</a>
                                        @elseif($user->ban_status == 0)
                                            <a href="{{route('change.ban.status', $user->id )}}" onclick="return confirm('Are you sure to ban this user?')" class="btn btn-success btn-sm">UnBan</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('user.detail', Crypt::encryptString($user->id) )}}" class="btn btn-success btn-sm">Detail</a>
                                        <form action="{{ route('delete.user',  $user->id )}}" method="POST" onclick="return confirm('Are you sure to delete this user?')" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

