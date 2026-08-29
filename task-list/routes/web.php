<?php


use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;




Route::get('/', function() {
    return redirect()->route('task.index');

});

Route::get('/tasks', function ()  {
    return view('index', [
        'tasks' => \App\Models\Task::latest()->get()

    ]);
})->name('task.index');

Route::view('/tasks/create', 'create')
->name('tasks.create');

Route::get('/tasks/{id}', function($id)   {
    return view('show', ['tasks'=> \App\Models\Task::findOrFail($id)]);
})->name('task.show');


Route::post('/tasks', function(Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'nullable',
        'completed' => 'boolean'
    ]);
})->name('tasks.store');


// Route::get('/julian', function () {
//     return 'julian is een dikke furry';
// })->name('julian');

// Route::get('/juliaan', function () {
//     return Redirect()->route('julian');
// });

// Route::get('/greet/{name}', function ($name) {
//     if ($name == "julian" || $name == "bastiaan") {
//         return "hello $name, you are a furry";
//     } elseif ($name == "cian" || $name == "yannick" || $name == "jannes") {
//         return "hello $name, you are a toffe peer";
//     } elseif ($name == "connor") {
//         return "$name, you kinda freaky broo";
//     }
//     else {
//         return "hello $name, you are norminal";
//     }
// });


Route::fallback(function(){

return 'you god damn idiot this is 404 use a right link you damn idiot';
});


