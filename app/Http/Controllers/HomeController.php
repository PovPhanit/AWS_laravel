<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return Post::onlyTrashed()->get();
        dd('success');
        // return view('home',compact('blogs'));
    }
}
