<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function terms()
    {
        return view('website.policy.terms');
    }

    public function privacy()
    {
        return view('website.policy.privacy');
    }

}
