<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CongratulationController;
use App\Models\Congratulation;
use Inertia\Inertia;

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
    return view('index',[
        'congra'=>Congratulation::where('status',2)->get()
        ]);
})->name('congratulations.index');
Route::get('/felicitar', function () {
    return view('felicitar');
});
Route::post('felicitar',[CongratulationController::class,'store'])->name('congratulation.store');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/felicitar-verificar', function () {
        return Inertia::render('Verificar',[
            "congratulations" => Congratulation::all(),
        ]);
    })->name('congratulation.verificar');
    Route::delete('felicitar-delete/{id}',[CongratulationController::class,'destroy'])->name('congratulation.delete');
    Route::get('felicitar-aceptar/{id}',[CongratulationController::class,'aceptar'])->name('congratulation.aceptar');
});
