<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Scooter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

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

        return view('users', compact('users'));
    }

    public function roles()
    {
        $roles = Role::query()->select('id', 'name')
            ->get();
        return view('role', compact('roles'));
    }

    public function scooter()
    {
        $scooters = Scooter::query()
            ->select('id', 'model', 'pic', 'base_price')
            ->get();

        return view('scooter', compact('scooters'));
    }

    public function add_scooter(Request $request)
    {
        $validate = $request->validate([
            'model' => 'string|required',
            'battery' => 'integer',
            'max_wieght' => 'integer',
            'w' => 'integer',
            "max_speed" => "integer",
            "range" => "integer",
            "base_price" => "integer|required"
        ]);

        if ($validate) {
            $file = $request->file()['picture'];
            $file_extension = $file->getClientOriginalExtension();
            $new_file_name = '' . time() . '.' . $file_extension;
            $file->move(public_path('/scooter_images'), $new_file_name);

            Scooter::query()->create([
                "model" => $request->model,
                "battery" => $request->battery,
                "max_weight" => $request->max_wieght,
                "weight" => $request->w,
                "max_speed" => $request->max_speed,
                "range" => $request->range,
                "base_price" => $request->base_price,
                "pic" => '/scooter_images/' . $new_file_name
            ]);

            Session::flash('message', "Scooter has been created");
            return back();

        } else {

            return redirect()->back();
        }
    }

    public function delete_scooter($id)
    {
        Scooter::query()->where('id', $id)->delete();
        Session::flash('message', "Scooter has been deleted");
        return back();
    }


    public function edit_scooter($id)
    {
        $scooter = Scooter::query()->findOrFail($id);
        return view('scooter.edit', compact('scooter'));
    }

    public function update_scooter(Request $request)
    {
        $validate = $request->validate([
            'id' => 'integer|required',
            'model' => 'string|required',
            'battery' => 'integer',
            'max_wieght' => 'integer',
            "max_speed" => "integer",
            "range" => "integer",
            "base_price" => "integer|required"
        ]);

        if ($validate) {
            Scooter::query()->where('id', $request->id)->update([
                "model" => $request->model,
                "battery" => $request->battery,
                "max_weight" => $request->max_wieght,
                "weight" => $request->w,
                "max_speed" => $request->max_speed,
                "range" => $request->range,
                "base_price" => $request->base_price,
            ]);
            Session::flash('message', "Scooter has been Updated");
            return redirect(route('scooter_list'));
        } else {
            return -1;
        }

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


