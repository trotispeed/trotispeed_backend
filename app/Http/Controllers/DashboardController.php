<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Scooter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('home-admin');
        }
        return redirect('/toriti-speed-login');
    }

    public function reservations()
    {
        return view('reservations');
    }

    public function queued()
    {
        return view('reservations-queued');
    }

    public function users()
    {
        $users = User::query()->where('role_id', 2)
            ->select('id', 'name', 'email', 'profile_pic')
            ->get();

        return view('users' , compact('users'));
    }

    public function roles(){
        $roles =  Role::query()->select('id' , 'name')
            ->get();
        return view('role' , compact('roles'));
    }

    public function scooter(){
        $scooters = Scooter::query()
            ->select('id' , 'model' , 'pic' , 'base_price')
            ->get();

        return view('scooter' , compact('scooters'));
    }

    public function login()
    {
        return view('myauth.login');
    }

    public function post_login(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $user = User::query()->where('email', $validate['email'])
            ->first();

        $credentials = $request->only('email', 'password');
        if ($user) {
            if (Auth::attempt($credentials)) {
                session()->forget('user_found');
                return view('home-admin');
            } else {
                session()->put('user_found', 'Wrong Credentials !');
                return redirect()->back();
            }
        }
        session()->put('user_found', 'Wrong Credentials !');
        return redirect()->back();

    }

}


