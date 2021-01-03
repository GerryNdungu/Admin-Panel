<?php

namespace App\Http\Controllers\Admin;

use App\Abouts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutsController extends Controller
{
    public function index()
    {
        $abouts = Abouts::all();
        return view('admin.abouts')->with('abouts',$abouts);
    }
    public function store(Request $request)
    {
        $abouts = new Abouts;

        $abouts->title = $request->input('title');
        $abouts->subtitle = $request->input('sub-title');
        $abouts->description = $request->input('desc');

        $abouts->save();
        return redirect('/abouts')->with('status',"Data added successfully");
    }
}
