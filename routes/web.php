<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Website Routing
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('test-submit', function () {
    return view('test-submit');
});

//Admin Routing
Route::get('/admin/student', function () {
    return view('admin.student');
});

Route::get('/admin/employee', function () {
    return view('admin.employee');
});

Route::get('/admin/lecture', function () {
    return view('admin.lecture');
});


//Test Submit Routing
Route::post('submit', function () {
    return "form has been submitted";
});

Route::delete('remove', function () {
    return "delete request sent";
});

Route::put('update', function () {
    return "update request sent";
});

//Route Group
Route::prefix('admin')->group(function () {
    Route::get('/student', function () {
        return view('admin.student');
    });

    Route::get('/employee', function () {
        return view('admin.employee');
    });

    Route::get('/lecture', function () {
        return view('admin.lecture');
    });
});

//Route Match
Route::match(['get', 'post', 'delete'], '/feedback', function (\Illuminate\Http\Request $request) {
    if ($request->isMethod('post')) {
        return 'Form submitted';
    }
    else if ($request->isMethod('method')) {
        return 'Form deleted';
    }
    return view('feedback');
});

//Passing Data from View to Routes
Route::get('/contact', function () {
    return view('contact');
});

Route::post('submit-contact', function (Request $request) {
    $name = $request->input('name');

    return "Received name: $name";
});

//From routes data to the view
Route::get('/users', function () {
    return view('users', ['name' => 'Mikhael', 'age' => '20']);
});

// Route Parameters
Route::get('/profile/{username}', function ($username) {
    return view('profile', ['username' => $username]);
});

// Route Fallback
Route::fallback(function () {
    return response()->view('fallback', [], 404);
    // return view('fallback'); what difference does it makes
});