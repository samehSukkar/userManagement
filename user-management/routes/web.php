<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

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
}]);

Route::get('/logout' , [userController::class , 'logout']);


Route::get('/', [userController::class , 'dashboard'] );

Route::post('/create-user' , [userController::class , 'createUser']);
Route::get('/create-user' , [userController::class , function(){
    return view('createUser');
}]);


Route::get('/user/{id}' ,  [userController::class , 'getUser'] );
Route::delete('/user/{id}' ,  [userController::class , 'deleteUser'] );
Route::put('edit-user/{id}' ,  [userController::class , 'editUser'] );
Route::get('edit-user/{id}' ,  [userController::class , 'editUserTemplate']);
