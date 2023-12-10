@extends('admin.master')

@section('title')
    Category Details
@endsection

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header fs-3 fw-bold">Category Details Page</div>
                        <p class="text-success text-center">{{session('message')}}</p>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th> Category ID </th>
                                    <td>{{$category->id}}</td>
                                </tr>
                                <tr>
                                    <th> Category Page Meta Description </th>
                                    <td>{{$category->meta_description}}</td>
                                </tr>
                                <tr>
                                    <th> Category Page Meta Keywords </th>
                                    <td>{{$category->meta_keyword}}</td>
                                </tr>
                                <tr>
                                    <th> Category Name </th>
                                    <td>{{$category->name}}</td>
                                </tr>
                                <tr>
                                    <th> Category Status</th>
                                    <td>
                                        @if($category->category_status == 1)
                                            <a href="{{ route('change.status.category', $category->id) }}" class="btn btn-success">Active</a>
                                        @else($category->category_status == 0)
                                            <a href="{{ route('change.status.category', $category->id) }}" class="btn btn-danger">InActive</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Action</th>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('category.edit', Crypt::encryptString($category->id) )}}" class="text-warning mx-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('category.destroy', $category->id )}}" method="post" onclick="return confirm('Are you sure to delete this category?')">
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
