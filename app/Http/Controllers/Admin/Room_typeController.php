<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room_type;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class Room_typeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms_type = Room_type::all();
        return view('admin.room_type.allRoom_type', compact('rooms_type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.room_type.addRoom_type');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'price' => 'required | integer',
            'length' => 'required |integer',
            'width' => 'required |integer',
            'amount' => 'required |integer'
        ]);
        Room_type::create([
            'price' => $request->price,
            'length' => $request->length,
            'width' => $request->width,
            'amount' => $request->amount
        ]);
        return redirect()->route('admin.room_type.index');
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
    public function update(Request $request, string $id)
    {

        $request->validate([
            'price' => 'required | integer',
            'length' => 'required |integer',
            'width' => 'required |integer',
            'amount' => 'required |integer'
        ]);
        $rooms_type = Room_type::findorFail($id);
        $rooms_type->price = $request->price;
        $rooms_type->length = $request->length;
        $rooms_type->width = $request->width;
        $rooms_type->amount = $request->amount;
        $rooms_type->save();
        return $rooms_type;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rooms_type = Room_type::findorFail($id);
        $rooms_type->delete();
        return $rooms_type;
    }
    public function pdf()
    {
        $data = Room_type::all()->toArray();
        $pdf = Pdf::loadView('admin.room_type.pdf', ['key' => $data]);
        return $pdf->download('invoice.pdf');
    }
}
