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
    public static function getListBlog()
    {
        return self::select(
            'id',
            'title',
            'content',
            'created_at',
            'updated_at'
        )
            ->where('created_user', Auth::id())->get();
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
                'created_user' => Auth::id()
            ]);
    }
    
    /**
     * deleteBlog
     * delete blog by id
     *
     * @param  mixed $id
     * @return void
     */
    public static function deleteBlog($id){
        self::where('id', $id)->delete();
    }

    /**
     * getBlogInfo
     * get blog info by blogid
     *
     * @param  int $id
     * @return void
     */
    public static function getBlogInfo($id)
    {
        return self::select(
            'id',
            'title',
            'content',
            'created_at',
            'updated_at'
        )->where('id', $id)->first();
    }
}
