<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
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
            if ($blog->created_user != Auth::id() and Auth::user()->role != 1) {
                // can't update orther user's post if user is not admin
                return redirect()->back();
            }
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
                if (Blog::find($request->id)->created_user != Auth::id() and Auth::user()->role != 1) {
                    // can't update orther user's post if user is not admin
                    return redirect()->back()->withErrors([
                        'message' => "Can not modify other user's post.",
                    ]);
                }
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
        if ($request->created_user != Auth::id() and Auth::user()->role != 1) {
            // can't update orther user's post if user is not admin
            return redirect()->back()->withErrors([
                'message' => "Can not delete other user's post.",
            ]);
        }
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
            $comments = Comment::getListComment($blog->id);
            return view('blog-detail', ['blog' => $blog, 'comments' => $comments]);
        }
        return redirect()->back();
    }

    /**
     * addComment
     *
     * @param  mixed $request
     * @return void
     */
    public function addComment(Request $request)
    {
        $data = $request->validate([
            'blog_id' => 'required|numeric',
            'content' => 'required'
        ]);

        if ($data) {
            Comment::addComment($data);
        }
        return redirect()->back();
    }
}
