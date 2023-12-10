@extends('website.master')

@section('meta_description')
    <meta name="description" content="This is author page.">
@endsection

@section('meta_keywords')
    <meta name="keywords" content="S M Alif Ahmmed, blog, ">
@endsection

@section('title')
    Author Details
@endsection

@section('content')

    <section class="section-sm border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title-bordered mb-5 d-flex align-items-center">
                        <h1 class="h4">S M Alif Ahmmed</h1>
                        <ul class="list-inline social-icons ml-auto mr-3 d-none d-sm-block">
                            <li class="list-inline-item"><a href="https://facebook.com/smalifahmmed.1" target="_blank"><i class="ti-facebook"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="https://twitter.com/SMAlifAhmmed/" target="_blank"><i class="ti-twitter-alt"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="https://github.com/s-m-alif-ahmmed" target="_blank"><i class="ti-github"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mb-4 mb-md-0 text-center text-md-left">
                    <img class="rounded-lg img-fluid" src="{{asset('/')}}website/images/author_full.jpg">
                </div>
                <div class="col-lg-9 col-md-8 content text-center text-md-left">
                    <p>
                        Hello there! Thank you for visiting my profile. I am a practical experienced PHP Laravel web developer. With a keen eye for detail and a passion for delivering high-quality results, I strive to exceed client expectations and ensure complete satisfaction. I am proficient in both front-end and back-end development. I have a strong command over HTML, CSS, Bootstrap, JavaScript, and jQuery to create engaging user interfaces. I have a deep understanding of the PHP programming language and its frameworks, with a primary focus on Laravel Framework and MySQL.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title text-center">
                        <h2 class="mb-5">Posted by this author</h2>
                    </div>
                </div>
                @foreach($blogs as $blog)
                    @if($blog->blog_status == 1)
                        <div class="col-lg-4 col-sm-6 mb-4 h-100">
                            <article class="mb-5">
                                <div class="post-slider slider-sm">
                                    <img src="{{ asset($blog->image) }}" class="img-fluid" alt="{{ $blog->alt }}" style="height:200px; object-fit: cover; border-radius: 15px;">
                                </div>
                                <h3 class="h5">
                                    <a class="post-title" href="{{ route('details', Crypt::encryptString($blog->id)) }}">
                                        {{ $blog->heading }}
                                    </a>
                                </h3>
                                <ul class="list-inline post-meta mb-2">
                                    <li class="list-inline-item">
                                        <i class="ti-user mr-2"></i>
                                        <a href="{{ route('author') }}">
                                            {{ $blog->author_name }}
                                        </a>
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
                                            </a> ,
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
        </div>
    </section>

@endsection
