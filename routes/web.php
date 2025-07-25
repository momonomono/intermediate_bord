<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get("/", [MainController::class, "index"])->name("top");
Route::post("/", [MainController::class, "store"])->name("store");
Route::patch("/", [MainController::class, "edit"])->name("edit");

Route::post("/selecter", [MainController::class, "selecter"])->name("selecter");

Route::post("delete", [MainController::class, "delete"])->name("delete");

Route::get('/dashboard', function () {
    return redirect()->route("top");
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
