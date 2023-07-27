<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\ProgramName;

class BlogController extends Controller
{
    public function blog(){
        $programContent = ProgramName::all();
        $blogContent = Blog::all();
        return response()->json([
            'status'=>200,
            'program'=>$programContent,
            'blog'=>$blogContent
        ],200);
    }
}
