<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'blog_id',
        'content',
        'created_user',
        'updated_user'
    ];
    
    /**
     * users
     *  1 comment belongs to 1 user
     * @return void
     */
    public function users(){
        return $this->belongsTo(User::class, 'created_user');
    }
    
    /**
     * blogs
     *  1 comment belongs to 1 blog
     * @return void
     */
    public function blogs(){
        return $this->belongsTo(Blog::class, 'created_user');
    }

    /**
     * addComment
     * add new comment
     *
     * @param  mixed $data
     * @return void
     */
    public static function addComment($data)
    {
        self::create([
            'blog_id' => $data['blog_id'],
            'content' => $data['content'],
            'created_user' => Auth::id()
        ]);
    }
    
    /**
     * getListComment
     * get list comment of blog by blog_id
     *
     * @param  mixed $blog_id
     * @return void
     */
    public static function getListComment($blog_id)
    {
        $comments = self::select(
            'comments.id',
            'content',
            'comments.created_at',
            'u.name'
        )->join('users as u', 'u.id', 'comments.created_user')
            ->where('blog_id', $blog_id)
            ->get();
        return $comments;
    }
}
