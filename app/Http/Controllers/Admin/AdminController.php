<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Reservation;
use App\Models\Reservation_room;
use App\Notifications\AdminNotification;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function dashboard()
    {
        // هنا بدي احط اللوحة تاعت الادمن
        // App::setLocale($lang);
        return view('admin.adminIndex');
    }
    function page()
    {
        $rooms = Room::all();
        return view('page', compact('rooms'));
    }
    function profile()
    {
        return view('admin.adminIndex');
    }

    function profile_update(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        /** @var Admin $admin */
        $admin = Auth::guard('admin')->user();
        $admin->name = $request->name;
        $admin->save();
        return redirect()->back();
    }
    function book()
    {
        $rooms = Room::all();
        return view('book', compact('rooms'));
    }
    function book_data(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'price' => 'required'
        ]);
        preg_match('/[A-Za-z]{3} (\w{3}) (\d{2}) (\d{4})/', $request->check_in, $matches);
        $monthAbbreviation = $matches[1];
        $monthNumber = date('n', strtotime("$monthAbbreviation 1"));
        $check_in = sprintf('%04d-%02d-%02d', $matches[3], $monthNumber, $matches[2]);

        $r = Reservation::create([
            'user_id' => $request->user_id,
            'check_in' => $check_in,
            'price' => $request->price

        ]);
        Reservation_room::create([
            'status' => 'on',
            'reservation_id' => $r->id,
            'room_id' => $request->room_id
        ]);
        $admin = Admin::find(2);
        $admin->notify(new AdminNotification($request->room_id,$r->id));
        return redirect()->back()->with('mas','Added .');
    }
    function read($id) {
        Auth::guard('admin')->user()->notifications->find($id)->markAsRead();
        return redirect()->back();
    }
}
