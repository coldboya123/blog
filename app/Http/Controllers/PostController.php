<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web', ['except' => 'login']);
    }

    /**
     * showPostPage
     * how post page
     *
     * @return void
     */
    public function showPostPage(Request $request)
    {
        $blog = array();
        if ($request->has('id')) {
            $blog = Blog::getBlogInfo($request->id);
        }
        return view('post-new-blog', ['blog' => $blog]);
    }

    /**
     * postBlog
     * post new blog
     *
     * @param  mixed $request
     * @return void
     */
    public function postBlog(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);
        if ($data) {
            if ($request->has('id') and $request->id) {
                Blog::updateBlog($data, $request->id);
            } else {
                Blog::addBlog($data);
            }
            return redirect('user');
        }
        return redirect()->back()->withErrors([
            'message' => 'Something went wrong.',
        ]);
    }

    /**
     * deleteBlog
     * delete blog
     *
     * @param  mixed $request
     * @return void
     */
    public function deleteBlog(Request $request)
    {
        Blog::deleteBlog($request->id);
        return redirect()->back();
    }

    /**
     * blogDetail
     * show blog detail
     *
     * @param  mixed $request
     * @return void
     */
    public function blogDetail(Request $request)
    {
        $blog = Blog::getBlogInfo($request->id);
        if ($blog) {
            return view('blog-detail', ['blog' => $blog]);
        }
        return redirect()->back();
    }
}
