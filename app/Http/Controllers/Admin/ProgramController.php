<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramName;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programName = ProgramName::all();
        return view('admin.pages.blog.program',compact('programName'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.blog.createProgram');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'program_name'=>'required',
            'slug_name'=>'required'
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $program = new ProgramName;
        $program->program_name=$request->program_name;
        $program->slug_name=$request->slug_name;
        $program->image=$imageName;
        $program->save();
        return back()->with('success','New Program Name Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $program=ProgramName::find($id);
        return view('admin.pages.blog.editprogram',compact('program'));
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
        // return $request->all();
        $program=ProgramName::where('id',$id)->first();
        if($request->image){
            unlink(public_path('images/'.$program->image));
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $program->image=$imageName;
        }
        $program->program_name=$request->program_name;
        $program->slug_name=$request->slug_name;
        $program->save();
        return redirect('admin/program-name')->with('success','Program name Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProgramName::destroy($id);
        return redirect('admin/program-name')->with('success','Program Successfully Deleted');
    }
}
