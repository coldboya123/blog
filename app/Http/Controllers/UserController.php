<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth:web', ['except' => 'login']);
    }

    /**
     * showUserPage
     * show user page
     *
     * @return void
     */
    public function showUserPage(){
        $listBlog = Blog::getListBlog(Auth::id());
        return view('user', ['blogs' => $listBlog]);
    }
}
