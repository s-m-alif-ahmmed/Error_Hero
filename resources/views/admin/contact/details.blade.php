@extends('admin.master')

@section('title')
    Contact Details
@endsection

@section('content')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header fs-3 fw-bold"> Contact Message Details Page</div>
                        <p class="text-success text-center">{{session('message')}}</p>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th> Contact ID </th>
                                    <td> {{$contact->id}} </td>
                                </tr>
                                <tr>
                                    <th>  Comment Create </th>
                                    <td>
                                        {{ $contact->created_at->setTimezone('Asia/Dhaka')->format('M d, Y, h:ia') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th> Name </th>
                                    <td> {{$contact->name}} </td>
                                </tr>
                                <tr>
                                    <th> Official Email </th>
                                    <td> {{$contact->email}} </td>
                                </tr>
                                <tr>
                                    <th> Message </th>
                                    <td> {{$contact->message}} </td>
                                </tr>
                                <tr>
                                    <th> Status </th>
                                    <td>
                                        @if($contact->status == 'Read')
                                            <a href="{{route('status.contact', $contact->id)}}" onclick="return confirm('Are you sure to change status?')" class="btn btn-success btn-sm">Read</a>
                                        @elseif($contact->status == 'unRead')
                                            <a href="{{route('status.contact', $contact->id)}}" onclick="return confirm('Are you sure to change status?')" class="btn btn-primary btn-sm">UnRead</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Action</th>
                                    <td>
                                        <div class="d-flex">
                                            <form action="{{ route('contact-us.destroy', $contact->id )}}" method="post" onclick="return confirm('Are you sure to delete this contact message?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-danger border-0" type="submit"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th> Our Note </th>
                                    <td>
                                        @if($contact->note)

                                            <div class="d-flex justify-content-between">
                                                {!! $contact->note !!}
                                                <a href="{{ route('contact-us.edit', Crypt::encryptString($contact->id)) }}" class="text-warning mx-1"  data-bs-target="#editNote" data-bs-toggle="modal" data-bs-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>

                                                <div class="modal fade" id="editNote" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Add Note</h1>
                                                            </div>
                                                            <form action="{{ route('contact-us.update', Crypt::encryptString($contact->id)) }}" method="post">
                                                                @csrf
                                                                @method('patch')

                                                                <div class="modal-body">

                                                                    <input type="hidden" name="name" value="{{ $contact->name }}">
                                                                    <input type="hidden" name="email" value="{{ $contact->email }}">
                                                                    <input type="hidden" name="message" value="{{ $contact->message }}">

                                                                    <textarea name="note" id="summernote" cols="30" rows="5">
                                                                            {{ $contact->note }}
                                                                        </textarea>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Update Note</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        @else

                                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Open first modal</button>

                                            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Add Note</h1>
                                                        </div>
                                                        <form action="{{ route('contact-us.update', Crypt::encryptString($contact->id)) }}" method="post">
                                                            @csrf
                                                            @method('patch')

                                                            <div class="modal-body">

                                                                <input type="hidden" name="name" value="{{ $contact->name }}">
                                                                <input type="hidden" name="email" value="{{ $contact->email }}">
                                                                <input type="hidden" name="message" value="{{ $contact->message }}">

                                                                <textarea name="note" id="summernote" cols="30" rows="5"></textarea>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save Note</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        @endif

                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
