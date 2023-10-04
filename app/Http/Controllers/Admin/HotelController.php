<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Hotel;
use App\Models\Image;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::all();
        $cities = City::all();
        return view('admin.hotel.allHotels', compact('hotels', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('admin.hotel.addHotel', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required |string',
            'descripitoin' => 'required | string',
            'city' => 'required'
        ]);
        $string = $request->img;
        $images = explode(",", $string);
        $hotel = Hotel::create([
            'name' => $request->name,
            'city_id' => $request->city,
            'descripitoin' => $request->descripitoin
        ]);
        foreach ($images as $image) {
            $image =  new Image([
                'image' => $image
            ]);
            $hotel->images()->save($image);
        }
        return redirect()->route('admin.hotels.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hotel = Hotel::findorFail($id);
        $images = $hotel->images->get();
        return view('admin.hotel.show', compact('hotel', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function pdf($v)
    {
        $data = Hotel::all()->toArray();
        $pdf = Pdf::loadView('admin.hotel.pdf', ['key' => $data]);
        return $pdf->download('invoice.pdf');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required |string',
            'descripitoin' => 'required | string',
            'city' => 'required',
        ]);
        $hotel = Hotel::findorFail($id);
        $hotel->name = $request->name;
        $hotel->city_id = $request->city;
        $hotel->descripitoin = $request->descripitoin;
        $hotel->save();
        return $hotel;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hotel = Hotel::findorFail($id);
        $hotel->delete();
        return $hotel;
    }
}
