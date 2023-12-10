<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class UserController extends Controller
{

    public function users()
    {
        try {
            return view('admin.user.user',[
                'users' => User::all(),
            ]);
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    public function changeRole($id)
    {
        try {
            $getRole = User::select('role')->where('id',$id)->first();
            if($getRole->role == 'admin')
            {
                $role = 'user';
            }
            elseif($getRole->role == 'user')
            {
                $role = 'admin';
            }
            User::where('id',$id)->update(['role'=>$role]);
            return back()->with('message','Role changed successfully.');
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    public function changeBanStatus($id)
    {
        try {
            $banned = User::select('ban_status')->where('id',$id)->first();
            if($banned->ban_status == 1)
            {
                $banStatus = 0;
            }
            elseif($banned->ban_status == 0)
            {
                $banStatus = 1;
            }
            User::where('id',$id)->update(['ban_status'=>$banStatus]);
            return back()->with('message','Selected user Ban status changed successfully.');
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    public function usersDetail($id)
    {
        try {
            $decryptID = Crypt::decryptString($id);
            $this->user = User::find($decryptID);
            return view('admin.user.detail',['user' => $this->user]);
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    public function deleteUser($id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return redirect('/users')->with('error', 'User not found.');
            }

            $user->delete();

            return redirect('/users')->with('message', 'Your item delete successfully');
        } catch (DecryptException $e) {
            return abort(404);
        }
    }
}
