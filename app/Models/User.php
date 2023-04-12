<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'created_user',
        'updated_user'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * getListUser
     * get list user with filter name by keyword
     *
     * @param  mixed $keyword
     * @return void
     */
    public static function getListUser($keyword)
    {
        $listUser = self::select(
            'id',
            'name',
            'email',
            'created_at',
            'role'
        );
        if ($keyword) {
            $listUser->where('name', 'LIKE', '%' . $keyword . '%');
        }
        $listUser = $listUser->get();
        foreach ($listUser as $key => $user) {
            $listUser[$key]->role = $user->role == 1 ? 'admin' : 'user';
        }
        return $listUser;
    }

    /**
     * addUser
     * add new user
     *
     * @param  mixed $data
     * @param  mixed $role
     * @param  mixed $id
     * @return void
     */
    public static function addUser($data, $role = 0, $id = 0)
    {
        self::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'created_user' => $id,
            'role' => $role ? 1 : 2,
        ]);
    }

    /**
     * updateUser
     * update user info
     *
     * @param  mixed $data
     * @param  mixed $role
     * @return void
     */
    public static function updateUser($data, $role = 0)
    {
        self::where('id', $data['id'])
            ->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'updated_user' => Auth::id(),
                'role' => $role ? 1 : 2
            ]);
    }

    /**
     * deleteUser
     *
     * @param  mixed $id
     * @return void
     */
    public static function deleteUser($id)
    {
        self::where('id', $id)->delete();
    }

    /**
     * getUserInfo
     *
     * @param  mixed $id
     * @return void
     */
    public static function getUserInfo($id)
    {
        return self::select(
            'id',
            'name',
            'email',
            'role'
        )->where('id', $id)->first();
    }
}
