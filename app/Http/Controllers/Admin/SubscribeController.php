<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('admin.subscribe.manage',[
                'subscribes' => Subscribe::all(),
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Subscribe::createSubscribe($request);
            return back()->with('message', 'Subscribe Email address save successfully.');
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
            return view('admin.subscribe.details', [
                'subscribe' => Subscribe::find($decryptId),
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Change the specified seen or unseen in status.
     */
    public function changeStatusSubscribe($id)
    {
        $subscribeStatus = Subscribe::select('status')->where('id',$id)->first();
        if($subscribeStatus->status == 'unRead')
        {
            $status = 'Read';
        }
        elseif($subscribeStatus->status == 'Read')
        {
            $status = 'unRead';
        }
        Subscribe::where('id',$id)->update(['status'=>$status]);
        return back()->with('message','Subscribe email Status changed successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Subscribe::deleteSubscribe($id);
            return back()->with('message', 'Subscribe email delete successfully.');
        }catch (DecryptException $e){
            return abort(404);
        }
    }
}
