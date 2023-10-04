<?php

namespace App\Http\Controllers\Admin;

use App\Models\Countries;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Countries::all();
        return view('admin.country.allCountries', compact('countries'));
    }

    public function create()
    {
        return view('admin.country.addCountry');
    }

    public function store(Request $request)
    {
        $request->validate([
            'country' => 'required |string'
        ]);
        Countries::create([
            'name' => $request->country
        ]);
        return redirect()->route('admin.countries.index')
            ->with('mas', 'Country added .')
            ->with('icon', 'success');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request,  $id)
    {
        $request->validate([
            'country' => 'required |string'
        ]);
        $country = Countries::findorFail($id);
        $country->name =   $request->country;
        $country->save();
        // dd($country);
        return $country;
    }

    public function destroy($id)
    {
        $country = Countries::findorFail($id);
        $country->delete();
        return $country;
    }
    public function pdf()
    {
        $data = Countries::all()->toArray();
        $pdf = Pdf::loadView('admin.country.pdf', ['key' => $data]);
        return $pdf->download('invoice.pdf');
    }
}
