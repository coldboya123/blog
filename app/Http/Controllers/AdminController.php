<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function showAdmin(Request $request)
    {
        $listUser = User::getListUser($request->keyword);
        return view('admin', ['users' => $listUser]);
    }

    /**
     * showUserForm
     * show user form for add or update user
     *
     * @param  mixed $request
     * @return void
     */
    public function showUserForm(Request $request)
    {
        $user = array();
        if ($request->has('id')) {
            $user = User::getUserInfo($request->id);
        }
        return view('add-user', ['user' => $user]);
    }

    /**
     * modifyUser
     * create or update user
     *
     * @param  mixed $request
     * @return void
     */
    public function modifyUser(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|numeric',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255',
        ]);

        if ($data) {
            if ($request->has('id') and $request->id) {
                $request->validate([
                    'email' => 'unique:users,' . $request->id
                ]);
                User::updateUser($data, $request->role);
            } else {
                $request->validate([
                    'email' => 'unique:users'
                ]);
                User::addUser($data, $request->role, Auth::id());
            }
            return redirect('admin');
        }
        return redirect()->back()->withErrors([
            'message' => 'Something went wrong.',
        ]);
    }

    /**
     * deleteUser
     *
     * @param  mixed $request
     * @return void
     */
    public function deleteUser(Request $request)
    {
        User::deleteUser($request->id);
        return redirect()->back();
    }
}
