<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    function profile_image(Request $request)
    {
        $name = rand() . time() . $request->file('file')->getClientOriginalName();
        // $request->file('file')->move(storage_path('uploads'), $name);
        $request->file('file')->storeAs('/uploads', $name, 'public');
        $name = 'uploads/' . $name;

        /** @var Admin $admin */
        $admin = Auth::guard('admin')->user();
        Image::updateOrCreate([
            'imageable_id' => $admin->id
        ], [
            'image' => $name
        ]);
        // dd($ii);
        // $image = new Image([
        //     'image' => $name
        // ]);
        // $admin->image()->save($ii);
        return response()->json([
            "success" => true,
            "url"   => $name
        ]);
    }
    function profile_images(Request $request)  {
        $name = rand() . time() . $request->file('file')->getClientOriginalName();
        $request->file('file')->storeAs('/uploads', $name, 'public');
        $name = 'uploads/' . $name;
        return response()->json([
            "success" => true,
            "url"   => $name
        ]);
    }
}
