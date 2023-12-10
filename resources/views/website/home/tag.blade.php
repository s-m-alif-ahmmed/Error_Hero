@extends('website.master')

@section('meta_author')
    <meta name="author" content="S M Alif Ahmmed">
@endsection

@section('meta_description')
    <meta name="description" content="This is error hero blog website tags page.">
@endsection

@section('meta_keywords')
    <meta name="keywords" content="Error Hero, Blog, Tags, S M Alif Ahmmed.">
@endsection


@section('title')
    Tag Blogs
@endsection

@section('content')

    <section class="section-sm pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title text-center">
                        <h1 class="mb-5">{{ $tag->name }}</h1>
                    </div>
                </div>
                @foreach($blogs as $blog)
                    @if($blog->blog_status == 1 && $blog->tags->contains('id', $tag->id))
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <article class="mb-5">
                                <div class="mb-3">
                                    <img src="{{ asset($blog->image) }}" class="img-fluid" alt="{{ $blog->alt }}" style="height:250px; object-fit: cover; border-radius: 15px;" />
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
                                        Date : {{ $blog->created_at->format('M d, Y') }}
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
{{--                <div class="pagination-simple col-md-12 pt-5">--}}
{{--                    {{ $blogs->paginate(1) }}--}}
{{--                </div>--}}
            </div>
        </div>
    </section>

@endsection
