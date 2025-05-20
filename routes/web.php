<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\adminController;
use Illuminate\Http\Request;
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


//route
//route paramet
//route naming
//route group
Route::get('/', function () {
    return view('welcome');
});


// Route::get('about', function () {
//     return "<h1>About Page</h1>";
// })->name('about');
// Route::get('about/{id}', function ($id) {
//     return "<h1>$id hik</h1>";
// })->name('aboutID');
// Route::get('contact', function () {
//     return "<a href='".route('about')."'>Go now</a>";
// });
// Route::get('helper', function () {
//     return "<a href='".route('aboutID',5)."'>Go now</a>";
// });


//group
// Route::group(['prefix'=>'customer'],function(){
//     Route::get('/',function(){
//         return "cusomer list";
//     });
//     Route::get('/create',function(){
//         return "cusomer create";
//     });
//     Route::get('/new',function(){
//         return "cusomer new";
//     });
// });

// Route::get('/home',HomeController::class);
// Route::get('/about',[AboutController::class,'index']);
// Route::get('/contact',[ContactController::class,'index'] );
// Route::resource('news', BlogController::class);







// Route::resource('admin', BlogController::class)->middleware('authCheck2');
Route::resource('admin', BlogController::class);

Route::get('/unavailable',function(){
    return view('unavailable');
})->name('unavailable');



Route::group(["middleware"=>"authCheck"],function(){
    Route::get('/dashboard',function(){
        return view('dashboard');
    });
    Route::get('/setting',function(){
        return view('setting');
    });
});

//route middleware


//component
Route::get('/com',function(){
    $passData = 'data transfer';
    return view('com',compact('passData'));
});

//section
Route::get('/get-section',function(Request $request){
    $data = $request->session()->all();
    dd($data);
});
Route::get('/set-section',function(Request $request){
    session(['role'=>'admin']);
    $request->session()->put(['user_status'=>'logged_in']);
    session(['password'=>'12345']);
    return redirect('get-section');
});
Route::get('/destroy-section',function(Request $request){
    // $request->session()->forget(['user_status','role']);
    // session()->forget(['user_ip','role']);
    session()->flash('role','user');
    return redirect('get-section');
});


//clear cache
Route::get('/clear-cache',function(){
    Cache::forget('posts');
    return redirect('admin');
});