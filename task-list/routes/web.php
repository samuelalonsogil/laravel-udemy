<?php

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Task as ModelsTask;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('task.index');
});

Route::get('/tasks', function () {
    return view('index', [ 'tasks'=>ModelsTask::latest()->where('completed', true)->get() ] );
})->name('task.index');

Route::view('/tasks/create','create')->name('task.create');

Route::get('/tasks/{id}', function ($id) {
    return view( 'show', [ 'task'=>ModelsTask::findOrFail( $id ) ] );
})->name('task.show');

Route::post('/tasks', function(Request $request){
    //dd($request->all());
    $data = $request->validate( [ 
        'title'=> 'required|max:255',
        'description'=> 'required',
        'long_description'=> 'required',
     ] );

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();
    return redirect()->route('task.show', $task->id)->with('success','');
})->name('tasks.store');


/* Route::get('/hello', function () {
    return 'hello! ';
})->name('hello'); */

/* 
    this will use the name of the route to redirect instead of the actual route 
    in case it changes it will still work  
*/

/* Route::get('/hallo', function () {
    return redirect()->route('hello');
})->name('redirected_hello');

Route::get('/greet/{name}', function ($name) {
    return 'Hello ' . $name . ' !';
});

Route::fallback(function() {
    return 'Still got somewhere!';
}); */


