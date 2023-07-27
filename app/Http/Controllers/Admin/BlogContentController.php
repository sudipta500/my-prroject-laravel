<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\ProgramName;
use App\Models\Comment;

class BlogContentController extends Controller
{
    public function blog(){
        $programContent = ProgramName::all();
        $blogContent = Blog::paginate(10);
        return view('user.pages.blog.blog',['blog'=>$blogContent,'program'=> $programContent,'id'=>0]);
    }
    public function showBlog(string $id){
        $programContent = ProgramName::all();
        $blogContent = Blog::where('program_name_id',$id)->paginate(10);
        return view('user.pages.blog.blog',['blog'=>$blogContent,'program'=> $programContent,'id'=>$id]);
    }
    public function singleBlog(string $id){
        $blogContent = Blog::find($id);
        $comment= Comment::where("blog_id",$id)->with('user')->get();
        return view('user.pages.blog.single_blog',['blogdetails'=>$blogContent,'comment'=>$comment]);
    }
}
