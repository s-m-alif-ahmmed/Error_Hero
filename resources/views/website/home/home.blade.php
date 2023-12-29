@extends('website.master')

@section('meta_author')
    <meta name="author" content="S M Alif Ahmmed">
@endsection

@section('meta_description')
    <meta name="description" content="This is error hero blog website home page.">
@endsection

@section('meta_keywords')
    <meta name="keywords" content="Error Hero, Blog, Home, S M Alif Ahmmed.">
@endsection

@section('title')
    Error Hero
@endsection

@section('content')

    <section class="section pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <h1 class="visually-hidden"></h1>
                    @foreach($blogs->take(10) as $blog)
                        @if($blog->blog_status == 1)
                            @if($blog->home_status == 'active')
                            <article class="row mb-5">
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <div class="mb-3">
                                        <img src="{{ asset($blog->image) }}" class="img-fluid rounded-3" alt="{{ $blog->alt }}" style="height:200px; object-fit: cover; border-radius: 15px;">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h3 class="h5">
                                        <a class="post-title" href="{{ route('details', Crypt::encryptString($blog->id)) }}">{{ $blog->heading }}</a>
                                    </h3>
                                    <ul class="list-inline post-meta mb-2">
                                        <li class="list-inline-item"><i class="ti-user mr-2"></i><a href="{{ route('author', ['page' => 'author']) }}">{{ $blog->author_name }}</a>
                                        </li>
                                        <li class="list-inline-item">Date : {{ $blog->created_at->format('M d, Y') }}</li>
                                        <li class="list-inline-item">Categories :
                                            <a href="{{ route('blogs', Crypt::encryptString($blog->category->id)) }}" class="ml-1">
                                                {{ $blog->category->name }}
                                            </a>
                                        </li>
                                        <li class="list-inline-item">Tags :
                                            @foreach($blog->tags as $tag)
                                                <a href="{{ route('blog.tag', Crypt::encryptString($tag->id)) }}" class="ml-1">
                                                    {{ $tag->name }}
                                                </a>,
                                            @endforeach
                                        </li>
                                    </ul>
                                    <p>{{ $blog->short_description }}</p>
                                    <a href="{{ route('details', Crypt::encryptString($blog->id)) }}" class="btn btn-outline-primary">Continue Reading</a>
                                </div>
                            </article>
                            @endif
                        @endif
                    @endforeach
                </div>

                <aside class="col-lg-4">
                    <!-- Search -->
                    <div class="widget">
                        <h5 class="widget-title"><span>Search</span></h5>
                        <form action="{{ route('search.result') }}" method="GET" class="widget-search">
                            @csrf
                            <input id="search-query" name="search" value="{{ Request::get('search') }}" type="search" placeholder="Type &amp; Hit Enter...">
                            <button type="submit"><i class="ti-search"></i>
                            </button>
                        </form>
                    </div>
                    <!-- categories -->
                    <div class="widget">
                        <h5 class="widget-title"><span>Categories</span></h5>
                        <ul class="list-unstyled widget-list">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('blogs', Crypt::encryptString($category->id)) }}" class="d-flex">
                                        {{ $category->name }}
                                        <small class="ml-auto">( {{ $categoryCounts[$category->id] }} )</small>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- tags -->
                    <div class="widget">
                        <h5 class="widget-title"><span>Tags</span></h5>
                        <ul class="list-inline widget-list-inline">
                            @foreach($tags as $tag)
                                <li class="list-inline-item">
                                    <a href="{{ route('blog.tag', Crypt::encryptString($tag->id)) }}">{{ $tag->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- latest post -->
                    <div class="widget">
                        <h5 class="widget-title"><span>Latest Article</span></h5>
                        <!-- post-item -->
                        @foreach($blogs->sortByDesc('created_at')->take(5) as $blog)
                            @if($blog->blog_status == 1)
                            <ul class="list-unstyled widget-list">
                                <li class="media widget-post align-items-center">
                                    <a href="{{ route('details', Crypt::encryptString($blog->id)) }}">
                                        <img class="mr-3" src="{{ asset($blog->image) }}" alt="{{ $blog->alt }}" />
                                    </a>
                                    <div class="media-body">
                                        <h5 class="h6 mb-0">
                                            <a href="{{ route('details', Crypt::encryptString($blog->id)) }}">
                                                {{ $blog->heading }}
                                            </a>
                                        </h5>
                                        <small>{{ $blog->created_at->format('M d, Y') }}</small>
                                    </div>
                                </li>
                            </ul>
                            @endif
                        @endforeach
                    </div>
                </aside>
            </div>
        </div>
    </section>

@endsection
