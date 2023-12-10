<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchResult(Request $request)
    {
        try {
            $searchQuery = $request->input('search');

            if ($searchQuery) {
                $searchBlogs = Blog::where('heading', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('description', 'LIKE', '%' . $searchQuery . '%')
                    ->latest()
                    ->paginate(1);

                if ($searchBlogs->isEmpty()) {
                    return redirect()->back()->with('message', 'No matching result found.');
                } else {
                    return view('website.search.search', compact('searchBlogs'));
                }
            } else {
                return redirect()->back()->with('message', 'Please enter a search query.');
            }
        }catch (DecryptException $e) {
            return abort(404);
        }
    }


}
