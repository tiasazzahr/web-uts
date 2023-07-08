<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\CriteriaRatingController;
use App\Http\Controllers\CriteriaWeightController;
use App\Http\Controllers\DecisionController;
use App\Http\Controllers\NormalizationController;
use App\Models\CriteriaRating;
use App\Models\criteriaweights;



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
    return view('homepage');
});

Route::get('/diet', [EmployeeController::class, 'index'])->name('diet');
Route::get('/tambahpasien', [EmployeeController::class, 'tambahpasien'])->name('tambahpasien');


Route::post('/insertdata', [EmployeeController::class, 'insertdata'])->name('insertdata');

Route::get('/tampilkandata/{id}', [EmployeeController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [EmployeeController::class, 'updatedata'])->name('updatedata');


Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');

Route::resource('template', AlternativeController::class);
Route::resource('template', CriteriaRatingController::class);
Route::resource('template', CriteriaWeightController::class);
Route::resource('template', HomeController::class);
Route::resource('template', DecisionController::class);
Route::resource('template', NormalizationController::class);



Route::resources([
    'alternatives' => AlternativeController::class,
    'criteriaratings' => CriteriaRatingController::class,
    'criteriaweights' => CriteriaWeightController::class
]);

Route::get('home', [HomeController::class, 'index']);

Route::get('decision', [DecisionController::class, 'index']);

Route::get('normalization', [NormalizationController::class, 'index']);

Route::get('rank', [RankController::class, 'index']);

