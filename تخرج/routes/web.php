<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\UserController;
Use App\Http\Controllers\EnglishController;
Use App\Http\Controllers\TurkeyController;
Use App\Http\Controllers\ArabicController;
Use App\Http\Controllers\RateController;
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

Route::get('/', function () {
    return view('welcome');
});

//register
Route::get('signup',[UserController::class,'show']);
Route::post('signup',[UserController::class,'Create']);
Route::get('Logout',[UserController::class,'Out']);
Route::get('Login',[UserController::class,'Show2']);
Route::post('Login',[UserController::class,'Enter']);

//english
Route::get('/english',[EnglishController::class,'show']);
Route::get('/eTest',[EnglishController::class,'test']);
Route::post('/eTest/savequizresult',[EnglishController::class,'store']);
Route::get('/main',[EnglishController::class,'main']);
Route::get('/main/Letters',[EnglishController::class,'letters']);
Route::get('/main/present simple',[EnglishController::class,'psimple']);
Route::get('/main/past simple',[EnglishController::class,'pastsimple']);
Route::get('/main/Past Participle ',[EnglishController::class,'pastverbs']);
Route::post('/main/past irregular verbs ',[EnglishController::class,'pastverbsPost']);

//turkey
Route::get('/Turkey',[TurkeyController::class,'show']);
Route::get('/TTest',[TurkeyController::class,'test']);
Route::post('/TTest/savequizresult',[TurkeyController::class,'store']);
Route::get('/Tmain',[TurkeyController::class,'main']);
Route::get('/Tmain/letters',[TurkeyController::class,'letters']);
Route::get('/Tmain/present',[TurkeyController::class,'present']);
Route::get('/Tmain/irregular verbs',[TurkeyController::class,'irregular']);

//arabic
Route::get('/arabic',[ArabicController::class,'show']);
Route::get('/ATest',[ArabicController::class,'test']);
Route::post('/ATest/savequizresult',[ArabicController::class,'store']);
Route::get('/Amain',[ArabicController::class,'main']);
Route::get('/Amain/letters',[ArabicController::class,'letters']);
Route::get('/Amain/letters_part2',[ArabicController::class,'letters2']);
Route::get('/Amain/Grammer1',[ArabicController::class,'Grammer1']);
Route::post('/Amain/Grammer1',[ArabicController::class,'GrammerOne']);
Route::get('/Amain/listen',[ArabicController::class,'listen']);
Route::post('/Amain/listen',[ArabicController::class,'listenn']);

//contact
Route::get('/contact',[UserController::class,'contact']);
Route::post('/contact',[UserController::class,'contactpost']);
Route::get('/contact/check',[UserController::class,'check']);

//rate
Route::get('/rate',[RateController::class,'view']);
Route::post('/rate',[RateController::class,'rate']);

//admin
Route::post('/adminreplay',[UserController::class,'replay']);
Route::get('/adminlogout',[UserController::class,'adminlogout']);