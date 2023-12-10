@extends('admin.master')

@section('title')
    Tag Details
@endsection

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header fs-3 fw-bold">Tag Details Page</div>
                        <p class="text-success text-center">{{session('message')}}</p>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th> Tag ID </th>
                                    <td>{{$tag->id}}</td>
                                </tr>
                                <tr>
                                    <th> Tag Name </th>
                                    <td>{{$tag->name}}</td>
                                </tr>
                                <tr>
                                    <th> Tag Status </th>
                                    <td>
                                        @if($tag->tag_status == 1)
                                            <a href="{{ route('change.status.tag', $tag->id) }}" class="btn btn-success">Active</a>
                                        @else($tag->tag_status == 0)
                                            <a href="{{ route('change.status.tag', $tag->id) }}" class="btn btn-danger">InActive</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Action</th>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('tag.edit', Crypt::encryptString($tag->id) )}}" class="text-warning mx-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('tag.destroy', $tag->id )}}" method="post" onclick="return confirm('Are you sure to delete this tag?')">
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
