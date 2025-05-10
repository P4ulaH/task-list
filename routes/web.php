<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
use App\Models\Task;


// Redirect to tasks index
Route::get('/', function () {
  return redirect()->route('tasks.index');
});

// Route to list all tasks
Route::get('/tasks', function () {
  return view('index', [
    'tasks' => Task::latest()->paginate(20)
  ]);
})->name('tasks.index');

// Route to create a task
Route::view('/tasks/create', 'create')
  ->name('tasks.create');

// Route to edit a task
Route::get('/tasks/{task}/edit', function (Task $task) {
  return view('edit', [
    'task' => $task
  ]);
})->name('tasks.edit');

// Route to show a task
Route::get('/tasks/{task}', function (Task $task) {
  return view('show', [
    'task' => $task
  ]);
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request) {

  $task = Task::create($request->validated());

  // Flash success message to the session
  return redirect()->route('tasks.show', ['task' => $task->id])
    ->with('success', 'Task created successfully.');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {

  $task->update($request->validated());

  // Flash success message to the session
  return redirect()->route('tasks.show', ['task' => $task->id])
    ->with('success', 'Task updated successfully.');
})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task) {
  $task->delete();

  // Flash success message to the session
  return redirect()->route('tasks.index')
    ->with('success', 'Task deleted successfully.');
})->name('tasks.destroy');

Route::put('/tasks/{task}/toggle-complete', function (Task $task) {
  $task->toggleComplete();

  // Flash success message to the session
  return redirect()->back()->with('success', 'Task status changed successfully.');
})->name('tasks.toggle-complete');

Route::fallback(function () {
  return 'Invalid web link';
});
