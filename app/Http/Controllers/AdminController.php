<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web', ['except' => 'login']);
    }
    
    /**
     * showAdmin
     * show admin page
     *
     * @return void
     */
    public function showAdmin(){
        return view('admin');
    }
}
