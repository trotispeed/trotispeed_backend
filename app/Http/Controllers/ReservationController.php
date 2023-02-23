<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function validate_reservation(Request $request)
    {
        $user = User::query()->where('name', 'like', $request->user_name)
            ->select('id')
            ->first();
        if (!isset($user)) {
            return response()->json(
                ["message" => "User Doesnt Exists"], 400
            );
        } else {
            $user->email = $request->email;
            $user->save();
            $reservarion = Reservation::create([
                "allocation_date" => Carbon::now(),
                "scooter_id" => $request->scooter_id,
                "cin" => $request->cin,
                "scooter_id" => $request->scooter_id,
                "user_id" => $user->id,
                "user_tel" => $request->number
            ]);
            return $reservarion;
        }

    }

    public function counter($scooter_id, $user_id)
    {
        $resrvation = Reservation::query()->where('user_id', '=', $user_id)
            ->select('updated_at', 'duration')
            ->where('scooter_id', '=', $scooter_id)
            ->first();
        if (!isset($resrvation)) {
            return response()->json(
                ['msg' => 'no record found'], 404
            );
        }
        $base = Carbon::create($resrvation->updated_at);
        $now = Carbon::now();
        return $resrvation;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
