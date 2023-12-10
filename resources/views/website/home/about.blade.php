@extends('website.master')

@section('meta_description')
    <meta name="description" content="This is about page.">
@endsection

@section('meta_keywords')
    <meta name="keywords" content="S M Alif Ahmmed, blog, ">
@endsection

@section('title')
    About
@endsection

@section('content')

    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title-bordered mb-5 d-flex align-items-center">
                        <h1 class="h4">Hi, I Am S M Alif Ahmmed</h1>
                        <ul class="list-inline social-icons ml-auto mr-3 d-none d-sm-block">
                            <li class="list-inline-item">
                                <a href="https://facebook.com/smalifahmmed.1" target="_blank"><i class="ti-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://twitter.com/SMAlifAhmmed/" target="_blank"><i class="ti-twitter-alt"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://www.linkedin.com/in/s-m-alif-ahmmed-a6a237224/" target="_blank"><i class="ti-linkedin"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://github.com/s-m-alif-ahmmed" target="_blank"><i class="ti-github"></i></a>
                            </li>
                        </ul>
                    </div>
                    <img src="{{asset('/')}}website/images/author_full.jpg" class="img-fluid w-100 mb-4 rounded-lg" alt="author">
                    <div class="content">
                        <p>
                            Hello there! Thank you for visiting my profile. I am a practical experienced PHP Laravel web developer. With a keen eye for detail and a passion for delivering high-quality results, I strive to exceed client expectations and ensure complete satisfaction. I am proficient in both front-end and back-end development. I have a strong command over HTML, CSS, Bootstrap, JavaScript, and jQuery to create engaging user interfaces. I have a deep understanding of the PHP programming language and its frameworks, with a primary focus on Laravel Framework and MySQL.
                        </p>
                        <div class="quote"> <i class="ti-quote-left"></i>
                            <div>
                                <p>Life is a series of natural and spontaneous changes. Don’t resist them – that only create sorrow. Let reality changes be reality. Let things flow naturally way they like.</p> <span class="quote-by"> -S M Alif Ahmmed</span>
                            </div>
                        </div>
                        <hr>
                        <h4 id="my-skills--experiences">My Skills &amp; Experiences:</h4>
                        <ul>
                            <li>HTML</li>
                            <li>CSS</li>
                            <li>Bootstrap 5</li>
                            <li>JavaScript</li>
                            <li>Jquery</li>
                            <li>Ajax</li>
                            <li>PHP</li>
                            <li>Laravel Framework</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
