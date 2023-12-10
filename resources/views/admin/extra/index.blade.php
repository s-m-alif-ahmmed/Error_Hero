@extends('admin.master')

@section('title')
    Add Blog Extra
@endsection

@section('content')

    <section class="py-5">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-5">
            <div class="breadcrumb-title pe-3">Blog Extra</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add New Blog Extra</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-primary" id="swal-success" >{{session('message')}}</p>
{{--        <input type='button' class="btn btn-success mt-2" value='Success alert' id='swal-success'>--}}

        <!-- Create Blog Extra Form-->
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">Add New Blog Extra </h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 ">
                            <form class="row g-3" method="post" action="{{route('extra.store')}}" enctype="multipart/form-data">
                                @csrf
                                @method('post')

                                <div class="col-12 form-group">
                                    <label class="form-label"> Blog </label>
                                    <select class="form-control select2-show-search form-select" name="blog_id" data-placeholder="Choose one blog" required>
                                        @foreach($blogs as $blog)
                                            <option value="{{ $blog->id }}" {{$blog->extra_id == $blog->id ? 'selected' : ''}}>{{ $blog->heading }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 mb-5">
                                    <label for="title" class="form-label"> Blog Extra Title </label>
                                    <input class="form-control" id="title" name="title" type="text" placeholder="Enter blog extra title" />
                                </div>

                                <div class="col-12 mb-5">
                                    <label for="demo" class="form-label"> Blog Extra Image </label>
                                    <div class="col-3">
                                        <input type="file" class="dropify" name="image" placeholder="Enter blog extra image" data-height="150" />
{{--                                        <input id="demo" type="file" name="image"  placeholder="Enter blog extra image" />--}}
                                    </div>
                                </div>

                                <div class="col-12 mt-5">
                                    <label for="alt" class="form-label"> Blog Extra Image Alt Name</label>
                                    <input class="form-control" type="text" name="alt" id="alt" placeholder="Enter extra image alt name" />
                                </div>

                                <div class="col-12">
                                    <label for="code" class="form-label"> Blog Extra codes </label>
                                    <textarea class="form-control" name="code" placeholder="Enter code " ></textarea>
                                </div>

                                <div class="col-12">
                                    <label for="description" class="form-label"> Blog Extra Description </label>
                                    <textarea class="form-control" name="description" id="summernote" placeholder="Enter description" ></textarea>
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

