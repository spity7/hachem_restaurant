<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WithdrawalController;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    route::resource('employees', EmployeeController::class);

    route::post('/withdrawals/{employee}', [WithdrawalController::class, 'store'])->name('withdrawals.store');
    route::delete('/withdrawals/{withdrawal}', [WithdrawalController::class, 'destroyOne'])->name('withdrawals.destroyOne');
    route::delete('/withdrawals/employee/{employee}', [WithdrawalController::class, 'destroyMultiple'])->name('withdrawals.destroyMultiple');
    route::delete('/withdrawals', [WithdrawalController::class, 'destroyAll'])->name('withdrawals.destroyAll');

    route::resource('products', ProductController::class);

    route::delete('productDetails/destroy/{detail}', [ProductDetailController::class, 'destroy'])->name('productDetails.destroy');
    route::post('productDetails/add-Increase/{product}', [ProductDetailController::class, 'addIncrease'])->name('productDetails.addIncrease');
    route::post('productDetails/add-Decrease/{product}', [ProductDetailController::class, 'addDecrease'])->name('productDetails.addDecrease');

    route::resource('suppliers', SupplierController::class);

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::post('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::post('profile/change-password', [\App\Http\Controllers\ProfileController::class, 'changePassword'])->name('profile.changePassword');
});
