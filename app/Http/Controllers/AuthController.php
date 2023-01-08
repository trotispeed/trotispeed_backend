<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'password' => 'string|required'
        ]);

        $user = User::query()->where('name', $request->name)
            ->first();
        $data = [];

        if ($user == null) {
            $u = User::create([
                'name' => $request->name,
                'email' => $request->name . '@gmail.com',
                'password' => Hash::make($request->password),
                'role_id' => 2
            ]);
            $data['message'] = 'User Has Been Created';
            $data['user'] = $u;
            return response()->json($data, 201);
        } else {
            $data['message'] = 'User Already Exists';
            return response()->json($data, 400);
        }

    }

}
