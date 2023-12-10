@extends('admin.master')

@section('title')
    Comment Details
@endsection

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header fs-3 fw-bold">Comment Details Page</div>
                        <p class="text-success text-center">{{session('message')}}</p>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th> User Id </th>
                                    <td>{{$comment->user_id}}</td>
                                </tr>
                                <tr>
                                    <th> Blog Id </th>
                                    <td>{{$comment->blog_id}}</td>
                                </tr>
                                <tr>
                                <th> Comment Id </th>
                                    <td>{{$comment->id}}</td>
                                </tr>
                                <tr>
                                    <th> Parent ID </th>
                                    <td>{{$comment->parent_id}}</td>
                                </tr>
                                <tr>
                                    <th> Comment </th>
                                    <td>
                                        <textarea class="form-control">{{$comment->comment}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th> Comment Create Date </th>
                                    <td>
                                        {{ $comment->created_at->setTimezone('Asia/Dhaka')->format('M d, Y, h:ia') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Status</th>
                                    <td>
                                        @if($comment->status == 'active')
                                            <a href="{{ route('change.status.comment', $comment->id) }}" class="btn btn-success">Active</a>
                                        @else($comment->comment_status == 'inActive')
                                            <a href="{{ route('change.status.comment', $comment->id) }}" class="btn btn-danger">InActive</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Action</th>
                                    <td>
                                        <div class="d-flex">
{{--                                            <a href="{{route('comment.edit', Crypt::encryptString($comment->id) )}}" class="text-warning mx-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>--}}
                                            <form action="{{ route('comment.destroy', $comment->id )}}" method="post" onclick="return confirm('Are you sure to delete this comment?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-danger border-0 mx-2" type="submit"><i class="fa fa-trash"></i></button>
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
