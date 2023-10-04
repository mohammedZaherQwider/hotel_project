<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Reservation_room;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservations.allReservations',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms=Room::all();
        return view('admin.reservations.addReservation',compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'check_in' => 'required | date',
            'price' => 'required | integer',
            'user_id' => 'required | integer',
            'room'=>'required'
        ]);
        $r= Reservation::create([
            'check_in' => $request->check_in,
            'price' => $request->price,
            'user_id' => $request->user_id
        ]);
        Reservation_room::create([
            'reservation_id'=> $r->id,
            'room_id'=>$request->room,
            'status'=> 'ON'
        ]);
        return redirect()->route('admin.reservations.index');
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
        $request->validate(['check_out'=>'required|date']);
        $r = Reservation::findorFail($id);
        $r->check_out=$request->check_out;
        $r->save();
        return $r;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $r = Reservation::findorFail($id);
        $r->delete();
        return $r;
    }
    public function pdf()
    {
        $data = Reservation::all()->toArray();
        $pdf = Pdf::loadView('admin.reservations.pdf', ['key' => $data]);
        return $pdf->download('invoice.pdf');
    }
}
