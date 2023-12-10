@extends('admin.master')

@section('title')
    Edit Blog Extra
@endsection

@section('content')

    <section class="py-5">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Blog Extra</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Blog Extra</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        {{--        message--}}
        <p class="text-center text-primary">{{session('message')}}</p>

        <!-- Create Blog Extra Form-->
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">Edit Blog Extra</h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 ">
                            <form class="row g-3" method="post" action="{{route('extra.update', Crypt::encryptString($extra->id) )}}" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <div class="col-12 form-group">
                                    <label class="form-label"> Blog </label>
                                    <select class="form-control select2-show-search form-select" name="blog_id" data-placeholder="Choose one blog" required>
                                        @foreach($blogs as $blog)
                                            <option value="{{ $blog->id }}" {{$blog->id == $extra->blog_id ? 'selected' : ''}}>{{ $blog->heading }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 mt-5">
                                    <label for="title" class="form-label"> Blog Extra Title </label>
                                    <input class="form-control" type="text" name="title" id="title" placeholder="Enter extra title" value="{{ $extra->title }}" />
                                </div>

                                <div class="col-12 mb-5">
                                    <label for="image" class="form-label"> Blog Extra Image </label>
                                    <input class="form-control" id="demo"  name="image" type="file" placeholder="Enter blog extra image" value="{{ $extra->image }}" />
                                    <img src="{{ asset( $extra->image ) }}" alt="" class="h-100 pt-2 pb-5" width="150" />
                                </div>

                                <div class="col-12 mt-5">
                                    <label for="alt" class="form-label"> Blog Extra Image Alt Name</label>
                                    <input class="form-control" type="text" name="alt" id="alt" placeholder="Enter extra image alt name" value="{{ $extra->alt }}" />
                                </div>

                                <div class="col-12">
                                    <label for="code" class="form-label"> Blog Extra codes </label>
                                    <textarea class="form-control" name="code" placeholder="Enter code " >{{ $extra->code }}</textarea>
                                </div>

                                <div class="col-12">
                                    <label for="description" class="form-label"> Blog Extra Description </label>
                                    <textarea class="form-control" name="description" id="summernote" placeholder="Enter description" >{{ $extra->description }}</textarea>
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

