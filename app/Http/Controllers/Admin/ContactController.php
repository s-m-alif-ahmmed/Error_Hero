<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('admin.contact.manage',[
                'contacts' => Contact::all(),
            ]);
        }catch (DecryptException $e){
            return abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('front.home.contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Contact::createContact($request);
            return back()->with('message', 'message sent successfully.');
        }catch (DecryptException $e){
            return abort(404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $decryptId = Crypt::decryptString($id);
            return view('admin.contact.details', [
                'contact' => Contact::find($decryptId),
            ]);
        }catch (DecryptException $e){
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $decryptId = Crypt::decryptString($id);
            return view('admin.contact.detail',[
                'contact' => Contact::find($decryptId),
            ]);
        }catch (DecryptException $e){
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $decryptId = Crypt::decryptString($id);
            Contact::updateContact($request, $decryptId);
            return back()->with('message','Contact Note update successfully,');
        }catch (DecryptException $e){
            return abort(404);
        }
    }

    /**
     * Change the specified seen or unseen in status.
     */
    public function changeStatusContact($id)
    {
        $contactStatus = Contact::select('status')->where('id',$id)->first();
        if($contactStatus->status == 'unRead')
        {
            $status = 'Read';
        }
        elseif($contactStatus->status == 'Read')
        {
            $status = 'unRead';
        }
        Contact::where('id',$id)->update(['status'=>$status]);
        return back()->with('message','Contact Status changed successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Contact::deleteContact($id);
            return back()->with('message', 'Contact message delete successfully.');
        }catch (DecryptException $e){
            return abort(404);
        }
    }
}
