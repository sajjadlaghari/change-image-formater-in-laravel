<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function convertImage(Request $request)
    {

        $request->validate([
            'image_formate' => 'required'
        ]);
        $image = $request->file('image');

        if ($request->image_formate == 'jpg') {
            $ext = 'jpg';
        } elseif ($request->image_formate == 'png') {
            $ext = 'png';
        } elseif ($request->image_formate == 'webp') {
            $ext = 'webp';
        } elseif ($request->image_formate == 'jpeg') {
            $ext = 'jpeg';
        }

        $imageConvert = \Image::make($image->getRealPath())->stream($ext, 100);

        $filename = uniqid() . '.' . $ext;
        $image->move(public_path('image'), $filename);

        Storage::put('image/' . $filename, $imageConvert);

        // Storage::put('image/' . uniqid() . '.' . $ext, $imageConvert);

        return redirect()->route('home')->with(['filename' => $filename]);
    }
}
