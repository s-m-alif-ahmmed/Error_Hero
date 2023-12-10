<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('admin.category.manage',[
                'categories' => Category::all(),
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
            return view('admin.category.index');
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
            Category::createCategory($request);
            return back()->with('message','Category save successfully.');
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
            $category = Category::find($decryptID);

            if ($category) {
                return view('admin.category.details', [
                    'category' => $category,
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
            $category = Category::find($decryptID);

            if ($category) {
                return view('admin.category.edit', [
                    'category' => $category,
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
            Category::updateCategory($request, $decryptID);
            return back()->with('message','Category update successfully.');
        } catch (DecryptException $e) {
            return abort(404);
        }

    }

    /**
     * Change Status the specified resource.
     */
    public function changeCategoryStatus($id)
    {
        try {
            $category = Category::select('category_status')->where('id',$id)->first();
            if($category->category_status == 1)
            {
                $categoryStatus = 0;
            }
            elseif($category->category_status == 0)
            {
                $categoryStatus = 1;
            }
            Category::where('id',$id)->update(['category_status' => $categoryStatus ]);
            return back()->with('message','Selected category status changed successfully.');
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
            Category::deleteCategory($id);
            return back()->with('message','Category delete successfully.');
        } catch (DecryptException $e) {
            return abort(404);
        }

    }

}
