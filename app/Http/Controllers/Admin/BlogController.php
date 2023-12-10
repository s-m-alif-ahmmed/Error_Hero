<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('admin.blog.manage',[
                'blogs' => Blog::all(),
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
            $tags = Tag::all();
            return view('admin.blog.index',[
                'categories'    => Category::all(),
            ],compact('tags'));
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
            $blog = Blog::createBlog($request);
            if ($request->has('tags')) {
                $blog->tags()->attach($request->tags);
            }
            return back()->with('message', 'Blog saved successfully.');
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
            $category = Blog::find($decryptID);

            if ($category) {
                return view('admin.blog.details', [
                    'blog' => $category,
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
            $category = Blog::find($decryptID);
            $tags = Tag::all();

            if ($category) {
                return view('admin.blog.edit', [
                    'blog' => $category,
                ],compact('tags'));
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
            $blog = Blog::updateBlog($request, $decryptID);
            $blog->tags()->sync($request->tags);
            return back()->with('message','Blog update successfully.');
        } catch (DecryptException $e) {
            return abort(404);
        }

    }

    /**
     * Change Status the specified resource.
     */
    public function changeBlogStatus($id)
    {
        try {
            $blog = Blog::select('blog_status')->where('id',$id)->first();
            if($blog->blog_status == 1)
            {
                $blogStatus = 0;
            }
            elseif($blog->blog_status == 0)
            {
                $blogStatus = 1;
            }
            Blog::where('id',$id)->update(['blog_status' => $blogStatus ]);
            return back()->with('message','Selected blog status changed successfully.');
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    /**
     * Change Status home page the specified resource.
     */
    public function changeHomeBlogStatus($id)
    {
        try {
            $blog = Blog::select('home_status')->where('id',$id)->first();
            if($blog->home_status == 'active')
            {
                $homeStatus = 'inActive';
            }
            elseif($blog->home_status == 'inActive')
            {
                $homeStatus = 'active';
            }
            Blog::where('id',$id)->update(['home_status' => $homeStatus ]);
            return back()->with('message','Selected blog home page status changed successfully.');
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    /**
     * Change Status home page the specified resource.
     */
    public function changePopularBlogStatus($id)
    {
        try {
            $blog = Blog::select('popular_status')->where('id',$id)->first();
            if($blog->popular_status == 'active')
            {
                $popularStatus = 'inActive';
            }
            elseif($blog->popular_status == 'inActive')
            {
                $popularStatus = 'active';
            }
            Blog::where('id',$id)->update(['popular_status' => $popularStatus ]);
            return back()->with('message','Selected blog popular blog status changed successfully.');
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
            Blog::deleteBlog($id);
            return back()->with('message','Blog delete successfully.');
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

}
