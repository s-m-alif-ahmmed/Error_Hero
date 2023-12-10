@extends('admin.master')

@section('title')
    Dashboard
@endsection

@section('content')

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

        <!-- ROW-1 -->
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">{{$total_users}}</h3>
                                <p class="text-muted fs-13 mb-0">Total Users</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">{{$total_categories}}</h3>
                                <p class="text-muted fs-13 mb-0">Total Categories</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">{{$total_tags}}</h3>
                                <p class="text-muted fs-13 mb-0">Total Tags</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">{{$total_blogs}}</h3>
                                <p class="text-muted fs-13 mb-0">Total Blogs</p>
                                <div class="pt-2">
                                    <h3 class="mb-2 fw-semibold">{{$total_view_count}}</h3>
                                    <p class="text-muted fs-13 mb-0">Total All Blogs Views Count</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">{{$total_comments}}</h3>
                                <p class="text-muted fs-13 mb-0">Total Comments</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">{{$total_subscribes}}</h3>
                                <p class="text-muted fs-13 mb-0">Total Subscribers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- ROW-1 END-->

{{--        ROW-2--}}
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="my-3">Unseen Notifications</h6>
                        </div>
                        <div class="table-responsive mt-2">
                            <table id="example" class="table align-middle mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th>#SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contacts->sortByDesc('created_at') as $contact)
                                    @if($contact->status == 'unRead')
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                {{ $contact->name }}
                                            </td>
                                            <td>
                                                {{ $contact->email }}
                                            </td>
                                            <td>
                                                {{ $contact->message }}
                                            </td>
                                            <td>
                                                {{ $contact->created_at->setTimezone('Asia/Dhaka')->format('M d, Y, h:ia') }}
                                            </td>
                                            <td>
                                                @if($contact->status == 'read')
                                                    <a href="{{route('status.contact', $contact->id)}}" onclick="return confirm('Are you sure to change status?')" class="btn btn-success btn-sm">Read</a>
                                                @elseif($contact->status == 'unRead')
                                                    <a href="{{route('status.contact', $contact->id)}}" onclick="return confirm('Are you sure to change status?')" class="btn btn-primary btn-sm">Unread</a>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-3 fs-6">
                                                    <a href="{{route('contact-us.show', $contact->id)}}" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Views"><i class="bi bi-eye-fill"></i></a>
                                                    <form action="{{ route('contact-us.destroy', $contact->id )}}" method="post" onclick="return confirm('Are you sure to delete this contact message?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="text-danger border-0" type="submit"><i class="bi bi-trash-fill"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @else
                                    @endif
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div><!--end row-->

    </div>
</section>

@endsection
