<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\security\role\RoleController;
use App\Http\Controllers\security\user\UserController;
use App\Http\Controllers\staff\occupation\OccupationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\staff\employee\EmployeeController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//ocupation
Route::resource("occupation", OccupationController::class)->middleware('auth');

// Route::get('occupation', [OccupationController::class, 'index'])->name('staff.occupation.index')->middleware('auth');
// Route::get('occupation/edit/{id}', [OccupationController::class, 'edit'])->name('staff.occupation.edit');


//Employee
Route::resource('employee', EmployeeController::class)->middleware('auth');

//Ruta al index de role
Route::resource('role',RoleController::class)->middleware('auth');

//user
Route::resource('user', UserController::class)->middleware('auth');

Route::resource('partners', App\Http\Controllers\PartnerController::class);
Route::resource('subscriptionTypes', App\Http\Controllers\SubscriptionTypeController::class);
Route::resource('subscriptions', App\Http\Controllers\SubscriptionController::class);
Route::resource('payments', App\Http\Controllers\PaymentController::class);

Route::get('payment_subscriptions/{subscriptionId}', 'App\Http\Controllers\PaymentController@getPaymentsBySubscriptionId')->name('payments.subscription');

Route::get('payment_subscriptions_create/{subscriptionId}', 'App\Http\Controllers\PaymentController@createPaymentBySubscriptionId')->name('payments.subscription.create');

require __DIR__.'/auth.php';
