<?php


use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;



class Task
{
  public function __construct(
    public int $id,
    public string $title,
    public string $description,
    public ?string $long_description,
    public bool $completed,
    public string $created_at,
    public string $updated_at
  ) {
  }
}

$tasks = [
  new Task(
    1,
    'Buy groceries',
    'Task 1 description',
    'Task 1 long description',
    false,
    '2023-03-01 12:00:00',
    '2023-03-01 12:00:00'
  ),
  new Task(
    2,
    'Sell old stuff',
    'Task 2 description',
    null,
    false,
    '2023-03-02 12:00:00',
    '2023-03-02 12:00:00'
  ),
  new Task(
    3,
    'Learn programming',
    'Task 3 description',
    'Task 3 long description',
    true,
    '2023-03-03 12:00:00',
    '2023-03-03 12:00:00'
  ),
  new Task(
    4,
    'Take dogs for a walk',
    'Task 4 description',
    null,
    false,
    '2023-03-04 12:00:00',
    '2023-03-04 12:00:00'
  ),
];

Route::get('/', function() {
    return redirect()->route('task.index');

});

Route::get('/task', function () use($tasks) {
    return view('index', [
        'tasks' => $tasks

    ]);
})->name('task.index');

Route::get('/tasks/{id}', function($id)  use($tasks) {
    $task =collect($tasks)->firstWhere('id', $id);

    if (!$task) {
        abort(Response::HTTP_NOT_FOUND);
    }

    return view('show', ['tasks'=> $task]);
})->name('task.show');

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


