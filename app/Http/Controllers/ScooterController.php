<?php

namespace App\Http\Controllers;

use App\Models\Scooter;
use Illuminate\Http\Request;

class ScooterController extends Controller
{

    public function all()
    {
        return Scooter::query()->select('id', 'model', 'pic')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->model,
                    'image' => asset($item->pic)
                ];
            });
    }

    public function find_by_brand($id)
    {
        $scooters = Scooter::where('brand_id', '=', $id)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'model' => $item->model,
                    'battery' => $item->battery,
                    'max_weight' => $item->max_weight,
                    'weight' => $item->weight,
                    'max_speed' => $item->max_speed,
                    'range' => $item->range,
                    'base_price' => $item->base_price,
                    'pic' => asset($item->pic),
                    'brand_id' => $item->brand_id,
                    'stock' => $item->stock
                ];
            });
        return response()->json(
            ['data' => $scooters]
        );
    }

    public function scooter_info($id)
    {
        $scooter = Scooter::where('id', '=', $id)
            ->first();
        return response()->json($scooter);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param \App\Models\Scooter $scooter
     * @return \Illuminate\Http\Response
     */
    public function show(Scooter $scooter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Scooter $scooter
     * @return \Illuminate\Http\Response
     */
    public function edit(Scooter $scooter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Scooter $scooter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scooter $scooter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Scooter $scooter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scooter $scooter)
    {
        //
    }
}
