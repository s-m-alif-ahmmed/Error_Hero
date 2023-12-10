@extends('admin.master')

@section('title')
    Edit Blog
@endsection

@section('content')

    <section class="py-5">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Blog</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
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
                        <h5 class="mb-0">Edit Blog</h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 ">
                            <form class="row g-3" method="post" action="{{route('blog.update', Crypt::encryptString($blog->id) )}}" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <div class="col-12">
                                    <label class="form-label"> Blog Page Meta Author Name </label>
                                    <input class="form-control" type="text" name="meta_author" placeholder="Enter blog page meta author name " value="{{ $blog->meta_author }}"  />
                                </div>

                                <div class="col-12">
                                    <label class="form-label"> Blog Page Meta Description </label>
                                    <textarea class="form-control" type="text" name="meta_description" placeholder="Enter blog page meta description "  >{{ $blog->meta_description }}</textarea>
                                </div>

                                <div class="col-12">
                                    <label class="form-label"> Blog Page Meta Keywords </label>
                                    <textarea class="form-control" type="text" name="meta_keyword" placeholder="Enter blog page meta keywords "  >{{ $blog->meta_keyword }}</textarea>
                                </div>

                                <div class="col-12">
                                    <label for="author_name" class="form-label"> Blog Author </label>
                                    <input class="form-control" type="text" name="author_name" id="author_name" placeholder="Enter author name" value="{{ $blog->author_name }}" required />
                                </div>

                                <div class="col-12">
                                    <label for="heading" class="form-label"> Blog Heading </label>
                                    <input class="form-control" type="text" name="heading" id="heading" placeholder="Enter heading" value="{{ $blog->heading }}" required />
                                </div>

                                <div class="col-12 form-group">
                                    <label class="form-label"> Blog Category </label>
                                    <select class="form-control select2 form-select" name="category_id" data-placeholder="Choose one category" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{$category->id == $blog->category_id ? 'selected' : ''}}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 form-group">
                                    <label class="form-label">Blog Tags</label>
                                    <select multiple class="form-control select2-show-search form-select" id="tags" name="tags[]" data-placeholder="Choose multiple tags" required>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" @selected($blog->tags->contains($tag->id)) >{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="short_description" class="form-label"> Blog Short Description </label>
                                    <textarea class="form-control" name="short_description" placeholder="Enter short description" required >{{ $blog->short_description }}</textarea>
                                </div>

                                <div class="col-12">
                                    <label for="summernote" class="form-label"> Blog Description </label>
                                    <textarea class="form-control" name="description" id="summernote" placeholder="Enter description" required >{{ $blog->description }}</textarea>
                                </div>

                                <div class="col-12 mb-5">
                                    <label for="image" class="form-label"> Blog Image </label>
                                    <input class="form-control" type="file" name="image" id="image" placeholder="Enter blog image" value="{{ $blog->image }}" />
                                    <img src="{{ asset( $blog->image ) }}" alt="" class="h-100 pt-2 pb-5" width="150" />
                                </div>

                                <div class="col-12 mt-5">
                                    <label for="alt" class="form-label"> Blog Image Alt Name</label>
                                    <input class="form-control" type="text" name="alt" id="alt" placeholder="Enter image alt name" value="{{ $blog->alt }}" required />
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

