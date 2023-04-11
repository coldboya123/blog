<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

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
        $listBlog = Blog::getListBlog();
        return view('user', ['blogs' => $listBlog]);
    }
}
