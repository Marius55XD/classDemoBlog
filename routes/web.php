<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/blog', [PostController::class, 'index'])->name('blog.index');

// About page route
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');

// Contact page routes
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', function (Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|max:2000',
    ]);
    
    // In a real application, you would send an email here or save to database
    // For now, we'll just return with a success message
    
    return redirect()->route('contact')->with('success', 'Thank you for contacting us! Our team will review your message and get back to you within 24 hours.');
})->name('contact.submit');

// Blog routes
Route::resource('posts', PostController::class);

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
