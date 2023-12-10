<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Extra;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('admin.extra.manage',[
                'extras' => Extra::all(),
            ]);
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('admin.extra.index',[
                'blogs' => Blog::all(),
            ]);
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Extra::createExtra($request);
            return back()->with('message', 'Blog extra saved successfully.');
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $decryptID = Crypt::decryptString($id);
            $extra = Extra::find($decryptID);

            if ($extra) {
                return view('admin.extra.details', [
                    'extra' => $extra,
                    ]);
            } else {
                return abort(404);
            }
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $decryptID = Crypt::decryptString($id);
            $extra = Extra::find($decryptID);

            if ($extra) {
                return view('admin.extra.edit', [
                    'extra' => $extra,
                ]);
            } else {
                return abort(404);
            }
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $decryptID = Crypt::decryptString($id);
            Extra::updateExtra($request, $decryptID);
            return back()->with('message','Blog extra update successfully.');
        } catch (DecryptException $e) {
            return abort(404);
        }

    }

    /**
     * Change Status the specified resource.
     */
    public function changeExtraStatus($id)
    {
        try {
            $extra = Extra::select('status')->where('id',$id)->first();
            if($extra->status == 'active')
            {
                $extraStatus = 'inActive';
            }
            elseif($extra->status == 'inActive')
            {
                $extraStatus = 'active';
            }
            Extra::where('id',$id)->update(['status' => $extraStatus ]);
            return back()->with('message','Selected blog extra status changed successfully.');
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Extra::deleteExtra($id);
            return back()->with('message','Blog extra delete successfully.');
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

}
