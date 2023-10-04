<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Hotel;
use App\Models\Image;
use App\Models\Room_type;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        $hotels = Hotel::all();
        $hotels = Hotel::all();
        $room_type = Room_type::all();
        return view('admin.room.allRooms', compact('rooms', 'hotels', 'room_type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = Hotel::all();
        $room_type = Room_type::all();
        return view('admin.room.addRoom', compact('hotels', 'room_type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required |string',
            'descripitoin' => 'required | string',
            'hotel' => 'required',
        ]);
        $string = $request->img;
        $images = explode(",", $string);
        $room = Room::create([
            'name' => $request->name,
            'room_type_id' => $request->type,
            'hotel_id' => $request->hotel,
            'descripitoin' => $request->descripitoin
        ]);
        foreach ($images as $image) {
            $image =  new Image([
                'image' => $image
            ]);
            $room->images()->save($image);
        }
        return redirect()->route('admin.rooms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $room = Room::findorFail($id);
        $images = $room->images->get();
        return view('admin.room.show', compact('room', 'images'));
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
            'name' => 'required |string',
            'descripitoin' => 'required | string',
            'hotel' => 'required'
        ]);
        $room = Room::findorFail($id);
        $room->name = $request->name;
        $room->room_type_id = $request->type;
        $room->hotel_id = $request->hotel;
        $room->descripitoin = $request->descripitoin;
        $room->save();
        return $room;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::findorFail($id);
        $room->delete();
        return $room;
    }
    public function pdf()
    {
        $data = Room::all()->toArray();
        $pdf = Pdf::loadView('admin.room.pdf', ['key' => $data]);
        return $pdf->download('invoice.pdf');
    }
}
