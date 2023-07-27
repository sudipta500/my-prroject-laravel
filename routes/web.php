<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\BlogContentController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//user route

Route::get('/', function () {
    return view('user.pages.home');
})->name('/');

Route::get('/home', function () {
    return view('user.pages.authPage.home');
})->name('home');

Route::get('/service', function () {
    return view('user.pages.service');
})->name('service');

Route::get('/blog',[BlogContentController::class,'blog'])->name('blog');
Route::get('/blog/view/{id}',[BlogContentController::class,'showBlog'])->name('blog.view');
Route::get('/blog/single-view/{id}',[BlogContentController::class,'singleBlog'])->name('blog.single-view');

Route::get('/contact', function () {
    return view('user.pages.contact');
})->name('contact');


Route::middleware('auth')->group(function () {
    Route::post('like/{id}',[LikeController::class,'add'])->name('post.like');
    Route::post('comment/{id}',[CommentController::class,'add'])->name('post.comment');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //my course
    Route::get('/course', function () {
        return view('user.course.allcourse');
    })->name('course');
    Route::get('/one-course', function () {
        return view('user.course.course');
    })->name('one-course');

    Route::get('/course-video', function () {
        return view('user.course.course-video');
    })->name('course-video');
});

require __DIR__.'/auth.php';


//admin
Route::get('/admin/dashboard', function () {
    return view('admin.pages.blog.createProgram');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

Route::group(['middleware'=>['auth:admin'],'prefix'=>'admin','as'=>'admin.'],function(){
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //program name api
    Route::resource('program-name', ProgramController::class);
    Route::get('blog/{id}',[BlogController::class,'index']);
    Route::get('blog/create/{id}',[BlogController::class,'create']);
    Route::post('blog/create/{id}',[BlogController::class,'store']);
    Route::get('blog/view/{program_id}/{blog_id}',[BlogController::class,'viewBlog'])->name('blog.view');
    Route::get('blog/delete/{program_id}/{blog_id}',[BlogController::class,'destroy'])->name('blog.delete');
});

require __DIR__.'/adminauth.php';

