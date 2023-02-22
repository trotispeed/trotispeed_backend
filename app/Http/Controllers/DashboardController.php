<?php

namespace App\Http\Controllers;

use App\Models\ModelBrand;
use App\Models\Reservation;
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

    public function uploadcin($id)
    {
        return view('uploadcin', compact('id'));
    }

    public function post_cin(Request $request)
    {
        $file = $request->file()['picture'];
        $file_extension = $file->getClientOriginalExtension();
        $cin_f = '' . time() . '.' . $file_extension;
        $file->move(public_path('/cin'), $cin_f);


        $file = $request->file()['cin_back'];
        $file_extension = $file->getClientOriginalExtension();
        $cin_b = '' . time() . '.' . $file_extension;
        $file->move(public_path('/cin'), $cin_b);


        $reservation = Reservation::query()->where('id', '=', $request->id)
            ->first();

        $reservation->cin_front = $cin_f;
        $reservation->cin_back = $cin_b;
        $reservation->save();
        return 'User ID = ' . $request->id . 'Confirmed his CIN';

    }


    public function queued()
    {
        $reservations = Reservation::query()->where('confirmed', '=', 0)
            ->select('id', 'allocation_date', 'scooter_id', 'user_id', 'user_tel', 'cin')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'allocation_date' => $item->allocation_date,
                    'scooter' => Scooter::query()->where('id', '=', $item->scooter_id)
                        ->select('model')
                        ->first(),
                    'user' => User::query()->where('id', '=', $item->user_id)
                        ->select('name')
                        ->first(),
                    'user_tel' => $item->user_tel,
                    "cin" => $item->cin
                ];
            });
        return view('reservations-queued', compact('reservations'));
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
        $models = ModelBrand::query()->select('id', 'name')
            ->get();

        return view('scooter', compact('scooters', 'models'));
    }

    public function add_scooter(Request $request)
    {
        $validate = $request->validate([
            'model' => 'integer|required',
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

            $model = ModelBrand::query()->where('id', '=', $request->model)
                ->first();

            Scooter::query()->create([
                "model" => $model->name,
//                "model_image" => $model->image,
                "brand_id" => $model->id,
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
            'id' => 'required',
            'battery' => 'integer',
            "max_speed" => "integer",
            "range" => "integer",
            "base_price" => "integer|required"
        ]);

        if ($validate) {
            $file = $request->file()['picture'];
            $file_extension = $file->getClientOriginalExtension();
            $new_file_name = '' . time() . '.' . $file_extension;
            $file->move(public_path('/scooter_images'), $new_file_name);

            Scooter::query()->where('id', $request->id)->update([
                "battery" => $request->battery,
                "max_speed" => $request->max_speed,
                "range" => $request->range,
                "base_price" => $request->base_price,
                "pic" => '/scooter_images/' . $new_file_name
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


