<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        // Fakeユーザー情報一覧を返す
        return User::factory()->count(10)->make();
    }

    public function login(Request $request)
    {
        $password = $request->input('password');
        $username = $request->input('username');
        if (Auth::check()) {
            return response()->json([
                'success' => false,
                'msg' => 'ログイン済みです'
            ]);
        }
        // 一旦、ユーザ名とパスワードが等しければ適当なユーザーでログインする仕様
        if ($password == $username) {
            $user = User::first();
            Auth::login($user);
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'ユーザー名とパスワードは同じで！'
            ]);
        }
    }
}
