<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\DepartmentController;

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

Route::post('/login' , [userController::class , 'login']);

Route::get('/login' , [userController::class , function(){
    return view('login');
}])->name('login');

Route::get('/logout' , [userController::class , 'logout']);


Route::get('/', [userController::class , 'dashboard'] )->middleware('auth');

Route::post('/create-user' , [userController::class , 'createUser'])->middleware('auth');
Route::get('/create-user' , [userController::class , 'createUserView'])->middleware('auth');


Route::get('/user/{id}' ,  [userController::class , 'getUser'] )->middleware('auth');
Route::delete('/user/{id}' ,  [userController::class , 'deleteUser'] )->middleware('auth');
Route::put('edit-user/{id}' ,  [userController::class , 'editUser'] )->middleware('auth');
Route::get('edit-user/{id}' ,  [userController::class , 'editUserView'])->middleware('auth');

Route::post('/create-department' , [DepartmentController::class , 'createDepartment'])->middleware('auth');
Route::get('/create-department' , [DepartmentController::class , 'createDepartmentView'])->middleware('auth');