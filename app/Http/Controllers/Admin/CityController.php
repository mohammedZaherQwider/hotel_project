<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Countries;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class CityController extends Controller
{

    public function index()
    {
        $cities = City::all();
        $countries = Countries::all();
        return view('admin.city.allCities', compact('cities'))
        ->with('countries',$countries);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Countries::all();
       return view('admin.city.addCity', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'country'=>'required'
        ]);

        City::create([
            'name'=>$request->name,
            'country_id'=>$request->country
        ]);
        return redirect()->route('admin.cities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'name'=>'required',
            'country'=>'required'
        ]);
        $city=City::findorFail($id);
        $city->name=$request->name;
        $city->country_id=$request->country;
        $city->save();
        return $city;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $city = City::findorFail($id);
            $city->delete();
        return $city;
    }
    public function pdf()
    {
        $data = City::all()->toArray();
        $pdf = Pdf::loadView('admin.city.pdf', ['key' => $data]);
        return $pdf->download('invoice.pdf');
    }
}
