@extends('website.master')

@section('meta_author')
    <meta name="author" content="{{ $blog->meta_author }}">
@endsection

@section('meta_description')
    <meta name="description" content="{{ $blog->meta_description }}">
@endsection

@section('meta_keywords')
    <meta name="keywords" content="{{ $blog->meta_keyword }}">
@endsection


@section('title')
    Blog Details
@endsection

@section('content')

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <article class="row mb-4">
                        <div class="col-lg-12 mx-auto mb-4">
                            <h1 class="h2 mb-3">{{ $blog->heading }}</h1>
                            <ul class="list-inline post-meta mb-3">
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
                                        </a>,
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="mb-3 text-center">
                                <img src="{{ asset($blog->image) }}" class="img-fluid" alt="{{ $blog->alt }}" style="height: 450px; object-fit: cover; border-radius: 15px;" />
                            </div>
                        </div>
                        <div class="col-lg-12 mx-auto">
                            <div class="content">
                                <p style="font-size: 18px;">{{ strip_tags($blog->description) }}</p>
                            </div>
                        </div>
                        @if (!is_null($blog->extras) && count($blog->extras) > 0)
                            @foreach($blog->extras as $extra)
                                @if($extra->status == 'active')

                                    <div class="col-lg-12 rounded-2 mx-auto">
                                        <div class="content">
                                            <h4 class="fw-bolder">
                                                {{ $extra->title }}
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 rounded-2 mx-auto">
                                        <div class="content">
                                            <img src="{{ asset($extra->image) }}" class="img-fluid" alt="{{ $extra->alt }}" style="height: 450px; object-fit: cover; border-radius: 15px;" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mx-auto">
                                        <div class="content">
                                            <div class="highlight">
                                        <pre style=" color:#f8f8f2; background-color:#272822; -moz-tab-size:4; -o-tab-size:4; tab-size:4; border-radius: 15px;">
                                            <code class="language-javascript" data-lang="javascript">
                                                <span class="text-start" style="font-size: 16px;">
                                                    {{ $extra->code }}
                                                </span>
                                            </code>
                                        </pre>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mx-auto">
                                        <div class="content">
                                            <p style="font-size: 18px;">{{ strip_tags($extra->description)  }}</p>
                                        </div>
                                    </div>

                                @endif
                            @endforeach
                        @endif

                        <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Share Links:</h5>

                                        <div class="mt-2 pt-2 pb-3 border-top footer-container-main blog-footer">
                                            <div class="footer border-top-0 p-0 icons-bg d-sm-flex">
                                                <div class="social m-0">
                                                    <ul class="text-center">
                                                        <li>
                                                            <span class="icon fa-2x" >
                                                                {!! $shareButtons !!}
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        @include('website.comment.comment')

                                    </div>
                                </div>
                            </div>

                    </article>
                </div>

                <div class="col-lg-3">
                    <div class="card border">
                        <div class="card-header border-bottom">
                            <h3 class="card-title">Popular Posts</h3>
                        </div>
                        <div class="card-body">
                            <div class="item-list">
                                <ul class="list-group mb-0">
                                    @foreach($blogs->take(6) as $blog)
                                        @if($blog->blog_status == 1)
                                        @if($blog->popular_status == 'active')
                                        <li class="list-group-item d-flex pb-4 pt-0 px-0 border-bottom-0">
                                            <img src="{{ asset($blog->image) }}" class="avatar br-5 avatar-lg me-3 my-auto" alt="{{ $blog->alt }}">
                                            <div>
                                                <span class="d-block text-muted">
                                                    {{ $blog->category->name }}
                                                </span>
                                                <a href="{{ route('details', Crypt::encryptString($blog->id)) }}" class="text-dark text-16 font-weight-semibold">
                                                    {{ $blog->heading }}
                                                </a>
                                                <small class="d-block text-gray">{{ $blog->created_at->diffForHumans() }}</small>
                                            </div>
                                        </li>
                                        @endif
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
