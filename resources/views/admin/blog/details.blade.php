@extends('admin.master')

@section('title')
    Blog Details
@endsection

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header fs-3 fw-bold">Blog Details Page</div>
                        <p class="text-success text-center">{{session('message')}}</p>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th> Blog Id </th>
                                    <td>{{$blog->id}}</td>
                                </tr>
                                <tr>
                                    <th> Total View </th>
                                    <td>
                                        @if(!empty($blog->count))
                                            {{$blog->count}}
                                        @else
                                            0
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th> Blog Page Meta Author Name </th>
                                    <td>{{$blog->meta_author}}</td>
                                </tr>
                                <tr>
                                    <th> Blog Page Meta Description </th>
                                    <td>{{$blog->meta_description}}</td>
                                </tr>
                                <tr>
                                    <th> Blog Page Meta Keywords </th>
                                    <td>{{$blog->meta_keyword}}</td>
                                </tr>
                                <tr>
                                    <th> Blog Author </th>
                                    <td>{{$blog->author_name}}</td>
                                </tr>
                                <tr>
                                    <th> Blog Heading </th>
                                    <td>{{$blog->heading}}</td>
                                </tr>
                                <tr>
                                    <th> Blog Category </th>
                                    <td>{{$blog->category->name}}</td>
                                </tr>
                                <tr>
                                    <th> Blog Tag</th>
                                    <td>
                                        @if($blog->tags->count() > 0)
                                            <ul class="d-flex">
                                                @foreach($blog->tags as $tag)
                                                    <li> id - {{ $tag->id }}: {{ $tag->name }} </li>,
                                                @endforeach
                                            </ul>
                                        @else
                                            No tags associated with this blog.
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th> Blog Short Description </th>
                                    <td>{{$blog->short_description}}</td>
                                </tr>
                                <tr>
                                    <th> Blog Description </th>
                                    <td>
                                        <textarea id="summernote" cols="30" rows="10">{{$blog->description}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th> Blog Create Date </th>
                                    <td>
                                        {{ $blog->created_at->setTimezone('Asia/Dhaka')->format('M d, Y, h:ia') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Blog Home Status</th>
                                    <td>
                                        @if($blog->home_status == 'active')
                                            <a href="{{ route('change.status.home.blog', $blog->id) }}" class="btn btn-success">Active</a>
                                        @else($blog->home_status == 'inActive')
                                            <a href="{{ route('change.status.home.blog', $blog->id) }}" class="btn btn-danger">InActive</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th> Blog Popular Status</th>
                                    <td>
                                        @if($blog->popular_status == 'active')
                                            <a href="{{ route('change.status.popular.blog', $blog->id) }}" class="btn btn-success">Active</a>
                                        @else($blog->popular_status == 'inActive')
                                            <a href="{{ route('change.status.popular.blog', $blog->id) }}" class="btn btn-danger">InActive</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th> Blog Status</th>
                                    <td>
                                        @if($blog->blog_status == 1)
                                            <a href="{{ route('change.status.blog', $blog->id) }}" class="btn btn-success">Active</a>
                                        @else($blog->blog_status == 0)
                                            <a href="{{ route('change.status.blog', $blog->id) }}" class="btn btn-danger">InActive</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Action</th>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('blog.edit', Crypt::encryptString($blog->id) )}}" class="text-warning mx-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('blog.destroy', $blog->id )}}" method="post" onclick="return confirm('Are you sure to delete this blog?')">
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
