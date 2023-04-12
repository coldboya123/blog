<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'created_user',
        'updated_user'
    ];

    /**
     * getListBlock
     * get list block by userid
     *
     * @return void
     */
    public static function getListBlog($userid = 0)
    {
        $data = self::select(
            'blogs.id',
            'title',
            'content',
            'blogs.created_user',
            'blogs.created_at',
            'blogs.updated_at',
            'u.name as author'
        )->join('users as u', 'u.id', 'blogs.created_user');
        if($userid){
            $data->where('blogs.created_user', Auth::id())->get();
        }
        return $data->get();
    }

    /**
     * addBlock
     * post new block
     *
     * @param  mixed $data
     * @return void
     */
    public static function addBlog($data)
    {
        self::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'created_user' => Auth::id()
        ]);
    }

    /**
     * updateBlock
     * update block
     *
     * @param  mixed $data
     * @param  int $id
     * @return void
     */
    public static function updateBlog($data, $id)
    {
        self::where('id', $id)
            ->update([
                'title' => $data['title'],
                'content' => $data['content'],
                'updated_user' => Auth::id()
            ]);
    }

    /**
     * deleteBlog
     * delete blog by id
     *
     * @param  mixed $id
     * @return void
     */
    public static function deleteBlog($id)
    {
        self::where('id', $id)->delete();
    }

    /**
     * getBlogInfo
     * get blog info by blogid
     *
     * @param  int $id
     * @return object
     */
    public static function getBlogInfo($id)
    {
        return self::select(
            'blogs.id',
            'title',
            'content',
            'blogs.created_at',
            'blogs.updated_at',
            'blogs.created_user',
            'u.name as author'
        )->join('users as u', 'u.id', 'blogs.created_user')
        ->where('blogs.id', $id)->first();
    }
}
