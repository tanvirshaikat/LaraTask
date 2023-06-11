<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('tasks.index');
});


Route::get('/home', function () {
    return redirect()->route('tasks.index');
})->name('home');

Route::resource('tasks', 'TasksController')->parameters(['tasks' => 'id']);
Route::post('/tasks/priorityOrder', 'TasksController@priorityOrderSet')->name('tasks.priorityOrder');

Route::resource('projects', 'ProjectsController')->parameters(['projects' => 'id']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

