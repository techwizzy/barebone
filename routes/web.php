<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});



Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        $message = 'Good to see you again,  ' . Auth::user()->name;
        return redirect('access/users')->with('success', $message);
 })->name('dashboard');

    Route::group(['prefix' => 'access', 'as' => 'access.'], function () {
        Route::get('users/list', [ UserController::class, 'getUsers'])->name('users.list');
        Route::post('users/delete-user', [UserController::class, 'deleteUser'])->name('users.deleteuser');
        Route::get('users/delete/{id}', [UserController::class, 'UserController@destroy'])->name('users.delete');
        Route::get('users/profile/{id}', [UserController::class, 'profile'])->name('users.profile');

        Route::resources([
            'users' => UserController::class
        ]);

        Route::resources([
            'roles' => RoleController::class
        ]);

        Route::resources([
            'permissions' => PermissionController::class
        ]);


     /*    Route::resources([
            'roles' => RoleController::class
        ]); */
    });

});

require __DIR__.'/auth.php';
