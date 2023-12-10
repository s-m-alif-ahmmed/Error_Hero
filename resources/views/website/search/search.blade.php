@extends('website.master')

@section('meta_description')
    <meta name="description" content="This is search result page.">
@endsection

@section('title')
    Search Result
@endsection

@section('content')

    <section class="section-sm">
        <div class="container">
            <div class="row">
                <h1 class="visually-hidden">Search Result</h1>
                <div class="col-lg-12 py-5">
                    <!-- Search -->
                    <div class="widget">
                        <h5 class="widget-title"><span>Search Result</span></h5>
                        <p class="text-success text-muted text-center">{{session('message')}}</p>
                        <form action="{{ route('search.result') }}" method="GET" class="widget-search">
                            @csrf
                            <input id="search-query" name="search" value="{{ Request::get('search') }}" type="search" placeholder="Type &amp; Hit Enter...">
                            <button type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>
                </div>
                @if($searchBlogs->isEmpty())
                    <p>No matching results found.</p>
                @else
                    <div class="col-12">
                        @foreach($searchBlogs as $blog)
                            @if($blog->blog_status == 1)
                                <div class="col-lg-4 col-sm-6 col-12 mb-4">
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
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Pagination links -->
                            {{ $searchBlogs->appends(request()->input())->links('pagination::bootstrap-5') }}
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </section>

@endsection
