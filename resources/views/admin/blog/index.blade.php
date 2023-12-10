@extends('admin.master')

@section('title')
    Add Blog
@endsection

@section('content')

    <section class="py-5">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-5">
            <div class="breadcrumb-title pe-3">Blog</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add New Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-primary">{{session('message')}}</p>

        <!-- Create Blog Form-->
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">Add New Blog </h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 ">
                            <form class="row g-3" method="post" action="{{route('blog.store')}}" enctype="multipart/form-data">
                                @csrf
                                @method('post')

                                <div class="col-12">
                                    <label class="form-label"> Blog Page Meta Author Name </label>
                                    <input class="form-control" type="text" name="meta_author" placeholder="Enter blog page meta author name " required />
                                </div>

                                <div class="col-12">
                                    <label class="form-label"> Blog Page Meta Description </label>
                                    <textarea class="form-control" type="text" name="meta_description" placeholder="Enter blog page meta description " required ></textarea>
                                </div>

                                <div class="col-12">
                                    <label class="form-label"> Blog Page Meta Keywords </label>
                                    <textarea class="form-control" type="text" name="meta_keyword" placeholder="Enter blog page meta keywords " required ></textarea>
                                </div>

                                <div class="col-12">
                                    <label for="author_name" class="form-label"> Blog Author </label>
                                    <input class="form-control" type="text" name="author_name" id="author_name" placeholder="Enter author name" required />
                                </div>

                                <div class="col-12">
                                    <label for="heading" class="form-label"> Blog Heading </label>
                                    <input class="form-control" type="text" name="heading" id="heading" placeholder="Enter heading" required />
                                </div>

                                <div class="col-12 form-group">
                                    <label class="form-label"> Blog Category </label>
                                    <select class="form-control select2 form-select" name="category_id" data-placeholder="Choose one category" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{$category->blog_id == $category->id ? 'selected' : ''}} >{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 form-group">
                                    <label class="form-label">Blog Tags</label>
                                    <select multiple class="form-control select2-show-search form-select" id="tags" name="tags[]" data-placeholder="Choose multiple tags" required>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="short_description" class="form-label"> Blog Short Description </label>
                                    <textarea class="form-control" name="short_description" placeholder="Enter short description" required ></textarea>
                                </div>

                                <div class="col-12">
                                    <label for="summernote" class="form-label"> Blog Description </label>
                                    <textarea class="form-control" name="description" id="summernote" placeholder="Enter description" required ></textarea>
                                </div>

                                <div class="col-12">
                                    <label for="image" class="form-label"> Blog Image </label>
                                    <input class="form-control" type="file" name="image" id="image" placeholder="Enter blog image" required />
                                </div>

                                <div class="col-12">
                                    <label for="alt" class="form-label"> Blog Image Alt Name</label>
                                    <input class="form-control" type="text" name="alt" id="alt" placeholder="Enter image alt name" required />
                                </div>

                                <div class="col-12 text-center">
                                    <button class="btn btn-primary px-4" type="submit">Create</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection

