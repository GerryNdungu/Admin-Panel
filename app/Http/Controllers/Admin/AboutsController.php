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
        return view('admin.abouts.index')->with('abouts',$abouts);
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

    public function show($id)
    {
        $about = Abouts::find($id);

        return view('admin.abouts.edit')->with('about',$about);
    }

    public function update(Request $request,$id)
    {
        $about = Abouts::find($id);
        $about->title = $request->input('title');
        $about->subtitle = $request->input('sub-title');
        $about->description = $request->input('desc');
        $about->save();

        return redirect('/abouts')
            ->with('status','Data Updated Successfully');
    }

    public function delete($id)
    {
        $about = Abouts::findOrFail($id);

        $about->delete();

        return redirect('/abouts')->with('status','Data Deleted successfully');
    }
}
