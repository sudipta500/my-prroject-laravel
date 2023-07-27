<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $blogContent= Blog::where('program_name_id',$id)->get();
        return view('admin.pages.blog.blogcontent',['id'=>$id,'blogContent'=>$blogContent]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {

        return view('admin.pages.blog.createblog',['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,string $id)
    {
        $request->validate([
            'program_name'=>'required',
            'code'=>'required',
        ]);
        $blog = new Blog;
        $blog->program_name=$request->program_name;
        $blog->output=$request->output;
        $blog->code=$request->code;
        $blog->explain=$request->explain;
        $blog->program_name_id=$id;
        $blog->save();
        return redirect('admin/blog/'.$id)->with('success','New Blog Created Successfully');
    }

    public function viewBlog( $program_id,$blog_id){
        $blogdetails=Blog::find($blog_id);
        return view('admin.pages.blog.viewblog',compact('blogdetails'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($program_id,$blog_id)
    {
        Blog::destroy($blog_id);
        return redirect('admin/blog/'.$program_id)->with('success','blog Successfully Deleted');
    }
}
