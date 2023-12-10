@extends('website.dashboard.master')

@section('meta_description')
    <meta name="description" content="This is about page.">
@endsection

@section('meta_keywords')
    <meta name="keywords" content="S M Alif Ahmmed, blog, ">
@endsection

@section('userTitle')
    Dashboard
@endsection

@section('userContent')

    <section>
        <div class="main-container container-fluid">


            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Dashboard</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->


        </div>
    </section>

@endsection
