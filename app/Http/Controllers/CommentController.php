<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function add(Request $req, $id){
        $user=Auth::user();
        $isComment = $user->post_comment()->where('blog_id',$id)->count();
        if($isComment<4){
            $user->post_comment()->attach($id,[
                'comment'=>$req->comment
            ]);
            return redirect()->back();
        }else{
            // $user->post()->detach($id);
            return redirect()->back();
        }
    }
}
