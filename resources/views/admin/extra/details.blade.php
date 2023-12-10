@extends('admin.master')

@section('title')
    Blog Extra Details
@endsection

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header fs-3 fw-bold">Blog Extra Details Page</div>
                        <p class="text-success text-center">{{session('message')}}</p>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th> Blog Extra Id </th>
                                    <td>{{$extra->id}}</td>
                                </tr>
                                <tr>
                                    <th> Blog ID </th>
                                    <td>{{$extra->blog_id}}</td>
                                </tr>
                                <tr>
                                    <th> Blog Extra Title </th>
                                    <td>{{$extra->title}}</td>
                                </tr>
                                <tr>
                                    <th> Blog Extra image </th>
                                    <td>{{$extra->image}}</td>
                                </tr>
                                <tr>
                                    <th> Blog Extra Image Alt </th>
                                    <td>{{$extra->alt}}</td>
                                </tr>
                                <tr>
                                    <th> Blog Extra Codes </th>
                                    <td>
                                        <div class="highlight">
                                            <pre style="color:#f8f8f2;background-color:#272822;-moz-tab-size:4;-o-tab-size:4;tab-size:4">
                                                <code class="language-javascript" data-lang="javascript">
                                                    <span class="text-start">
                                                        {{ $extra->code }}
                                                    </span>
                                                </code>
                                            </pre>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th> Blog Extra Description </th>
                                    <td>
                                        <textarea id="summernote" cols="30" rows="10">{{$extra->description}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th> Blog Extra Create Date </th>
                                    <td>
                                        {{ $extra->created_at->setTimezone('Asia/Dhaka')->format('M d, Y, h:ia') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Blog Extra Status</th>
                                    <td>
                                        @if($extra->status == 'active')
                                            <a href="{{ route('change.status.extra', $extra->id) }}" class="btn btn-success">Active</a>
                                        @else($extra->status == 'inactive')
                                            <a href="{{ route('change.status.extra', $extra->id) }}" class="btn btn-danger">InActive</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Action</th>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('extra.edit', Crypt::encryptString($extra->id) )}}" class="text-warning mx-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('extra.destroy', $extra->id )}}" method="post" onclick="return confirm('Are you sure to delete this extra?')">
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
