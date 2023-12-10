<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Subscribe;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        try {
            $role = Auth::user()->role;
            $user_name = Auth::user()->name;

            if ($role == 'admin')
            {
                $users = User::all();
                $contacts = Contact::all();
                $blogs = Blog::all();
                $total_view_count = Blog::sum('count');
                $categories = Category::all();
                $tags = Tag::all();
                $comments = Comment::all();
                $subscribes = Subscribe::all();

                $total_users = count($users);
                $total_contacts = count($contacts);
                $total_blogs = count($blogs);
                $total_categories = count($categories);
                $total_tags = count($tags);
                $total_comments = count($comments);
                $total_subscribes = count($subscribes);

                return view('admin.dashboard.dashboard',compact('user_name'), [
                    'users' => $users,
                    'contacts' => $contacts,

                    'total_users' => $total_users,
                    'total_contacts' => $total_contacts,
                    'total_blogs' => $total_blogs,
                    'total_view_count' => $total_view_count,
                    'total_categories' => $total_categories,
                    'total_tags' => $total_tags,
                    'total_comments' => $total_comments,
                    'total_subscribes' => $total_subscribes,
                ]);
            }
            elseif($role == 'user')
            {
                return view('website.dashboard.dashboard.dashboard',compact('user_name'));
            }
            else
            {
                return view('auth.login');
            }
        } catch (DecryptException $e) {
            return abort(404);
        }

    }
}
