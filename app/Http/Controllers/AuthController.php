<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        
        $user = User::query()->where('name', 'like', $request->name)->first();
        $credentials = $request->only('name', 'password');
        $data = [];
        if (Auth::attempt($credentials)) {
            $data['message'] = "Success This Change saved tt0363143";
            return response()->json($data, 200);
        } else {
            return response()->json($data, 400);
        }
    }

}
