<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetRockController;
use App\Models\PetRock;

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
    return redirect('/petrock');
});

Route::resource('petrock', PetRockController::class);