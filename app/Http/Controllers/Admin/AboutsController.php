<?php

namespace App\Http\Controllers\Admin;

use App\Abouts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

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

        Session::flash('status_code','success');

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
        $about->update();

        Session::flash('status_code','info');
        return redirect('/abouts')
            ->with('status','Data Updated Successfully');
    }

    public function delete($id)
    {
        $about = Abouts::findOrFail($id);

        $about->delete();

        Session::flash('status_code','error');

        return redirect('/abouts')->with('status','Data Deleted successfully');
    }

    public function deleteTitle($id)
    {
        $about = Abouts::findOrfail($id);
        $about->delete();

        return response()->json(['status'=>'Data Deleted successfully']);
    }
}
