@extends('admin.master')

@section('title')
    Edit Category
@endsection

@section('content')

    <section class="py-5">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Category</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-primary">{{session('message')}}</p>

        <!-- Create Category Form-->
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">Edit Category</h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 ">
                            <form class="row g-3" method="post" action="{{route('category.update', Crypt::encryptString($category->id) )}}">
                                @csrf
                                @method('patch')

                                <div class="col-12">
                                    <label class="form-label"> Category Page Meta Description </label>
                                    <textarea class="form-control" type="text" name="meta_description" placeholder="Enter category page meta description " required >{{$category->meta_description}}</textarea>
                                </div>

                                <div class="col-12">
                                    <label class="form-label"> Category Page Meta Keywords </label>
                                    <textarea class="form-control" type="text" name="meta_keyword" id="summernote" placeholder="Enter category page meta keywords " required >{{$category->meta_keyword}}</textarea>
                                </div>

                                <div class="col-12">
                                    <label for="name" class="form-label"> Name</label>
                                    <input class="form-control" type="text" name="name" id="name" value="{{$category->name}}" placeholder="Enter category name" required />
                                </div>

                                <div class="col-12 text-center">
                                    <button class="btn btn-primary px-4" type="submit">Update</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection

