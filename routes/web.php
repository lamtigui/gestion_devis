<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\DevisController;
use App\Http\Controllers\Admin\FactureController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PayementController;
use App\Http\Controllers\Admin\RemiseController;
use App\Http\Controllers\ExcelController;
use  App\Http\Controllers\DocdeviController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\TailwickController;
use App\Models\Docdevi;
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

Route::permanentRedirect('/', '/admin');
Route::get('index/{locale}', [TailwickController::class, 'lang']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->name("admin.")->prefix("admin")->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get("/", 'index')->name('index');
    });
    Route::resource("client", ClientController::class);
    Route::resource("appointment", AppointmentController::class);
    Route::resource("devis", DevisController::class);
    Route::resource("modeles", ModeleController::class);
    Route::resource("docsdevis", DocdeviController::class);
    Route::get('generate_pdf/{id}',[DocdeviController::class,'generatePDF']);
    Route::get('generate_pdfff/{id}',[DocdeviController::class,'generatePDF'])->name('generate_pdf');
    Route::resource("factures", FactureController::class);
    Route::resource("payements", PayementController::class);
    Route::get("devis_model/{id}", [DevisController::class,"devis_model"])->name('devis_model');
    Route::post("generate/{id}", [DevisController::class,"generate_devi"])->name('generate');
    Route::get("adn_devis",function(){
        return view("content/docdevis/adn/create");
    });
    Route::controller(RemiseController::class)->group(function () {
        Route::get('remise/{devi}', "RemiseOfDevis")->name('RemiseOfDevis');
        Route::put('UpdateRemises/{devi}', "UpdateRemises")->name('UpdateRemises');
    });
    Route::controller(HomeController::class)->group(function () {
        Route::get('HistoriquePaiement', 'HistoriquePaiement')->name('HistoriquePaiement');
    });
    Route::controller(ExcelController::class)->name('excel.')->group(function () {
        Route::get('ExportFactures','ExportFactures')->name('ExportFactures');
        Route::get('ExportFacturesForUser','ExportFacturesForUser')->name('ExportFacturesForUser');
    });
});
