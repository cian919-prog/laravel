<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;




Route::get('/', function() {
    return redirect()->route('task.index');

});

Route::get('/tasks', function ()  {
    return view('index', [
        'tasks' => Task::latest()->get()

    ]);
})->name('task.index');

Route::view('/tasks/create', 'create')
->name('task.create');

Route::get('/tasks/{task}/edit', function(Task  $task)   {
    return view('edit', [
        'tasks' => $task
    ]);
})->name('task.edit');


Route::get('/tasks/{task}', function(Task $task)   {
    return view('show', ['tasks'=> $task]);
})->name('task.show');

Route::put('/tasks/{task}', function(Task $task, TaskRequest $request) {

    $task->update($request->validated());

    return redirect()->route('task.show', ['task' => $task->id])
    ->with('success','task updated succesfully');
})->name('task.update');


Route::post('/tasks', function(TaskRequest $request) {

     $task = Task::create($request->validated());

    return redirect()->route('task.show', ['task' => $task->id])
    ->with('success','task created succesfully');
})->name('task.store');


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


