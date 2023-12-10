@extends('website.master')

@section('meta_description')
    <meta name="description" content="{{ $category->meta_description }}">
@endsection

@section('meta_keywords')
    <meta name="keywords" content="{{ $category->meta_keyword }}">
@endsection

@section('title')
    Blogs
@endsection

@section('content')

    <section class="section-sm pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title text-center">
                        <h1 class="mb-1">{{ $category->name }}</h1>
                    </div>
                </div>
                @foreach($blogs as $blog)
                    @if($blog->blog_status == 1)
                        @if($blog->category_id == $category_id)
                            <div class="col-lg-4 col-sm-6 mb-4">
                                <article class="mb-5">
                                    <div class="mb-3">
                                        <img src="{{ asset($blog->image) }}" class="img-fluid" alt="{{ $blog->alt }}" style="height: 250px; object-fit: cover; border-radius: 15px;" />
                                    </div>
                                    <h3 class="h5">
                                        <a class="post-title" href="{{ route('details', Crypt::encryptString($blog->id)) }}">{{ $blog->heading }}</a>
                                    </h3>
                                    <ul class="list-inline post-meta mb-2">
                                        <li class="list-inline-item">
                                            <i class="ti-user mr-2"></i>
                                            <a href="{{ route('author') }}">{{ $blog->author_name }}</a>
                                        </li>
                                        <li class="list-inline-item">
                                            Date: {{ $blog->created_at->format('M d, Y') }}
                                        </li>
                                        <li class="list-inline-item">
                                            Categories:
                                            <a href="{{ route('blogs', Crypt::encryptString($blog->category->id)) }}" class="ml-1">
                                                {{ $blog->category->name }}
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            Tags:
                                            @foreach($blog->tags as $tag)
                                                <a href="{{ route('blog.tag', Crypt::encryptString($tag->id)) }}" class="ml-1">
                                                    {{ $tag->name }}
                                                </a>,
                                            @endforeach
                                        </li>
                                    </ul>
                                    <p>{{ $blog->short_description }}</p>
                                    <a href="{{ route('details', Crypt::encryptString($blog->id)) }}" class="btn btn-outline-primary">Continue Reading</a>
                                </article>
                            </div>
                        @endif
                    @endif
                @endforeach



                <div class="pagination-simple col-md-12 pt-5">
{{--                    <nav aria-label="Page navigation example">--}}
{{--                        <ul class="pagination justify-content-end">--}}
{{--                            <li class="page-item disabled">--}}
{{--                                <a class="page-link" >{{ $blogs->first_page_url() }}</a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item">--}}
{{--                                {{ $blogs->links() }}--}}
{{--                            </li>--}}
{{--                            <li class="page-item">--}}
{{--                                <a class="page-link"  href="{{route('next_page_url')}}">Next</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </nav>--}}
{{--                    {{ $blogs->appends(request()->input())->links() }}--}}
{{--                    {{ $blogs->links() }}--}}
{{--                    {{ $blogs->appends(request()->query())->links('pagination::bootstrap-5') }}--}}
{{--                    {!! $blogs->withQueryString()->links('pagination::bootstrap-5') !!}--}}
                </div>
            </div>
        </div>
    </section>

@endsection
