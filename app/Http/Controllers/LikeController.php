<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function add($id){
        $user=Auth::user();
        $islike = $user->post()->where('blog_id',$id)->count();
        if($islike==0){
            $user->post()->attach($id);
            return redirect()->back();
        }else{
            $user->post()->detach($id);
            return redirect()->back();
        }
    }
}
