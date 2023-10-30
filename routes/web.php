<?php

use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\AnalystController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ReceiptTypeController;
use App\Http\Controllers\UnitCategoryController;
use App\Http\Controllers\StaffTypeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UnitOwnerController;
  
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
    return redirect(route('login'));
});
  
Auth::routes();
  
Route::get('/home', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('blocks', BlockController::class);
    Route::resource('expense_categories', ExpenseCategoryController::class);
    Route::resource('unit_categories', UnitCategoryController::class);
    Route::resource('staff_types', StaffTypeController::class);
    Route::resource('receipt_types', ReceiptTypeController::class);
    Route::resource('units', UnitController::class);
    Route::resource('research', ResearchController::class);
    Route::resource('analyst', AnalystController::class);
    Route::resource('products', ProductController::class);
    Route::resource('unit_owners', UnitOwnerController::class);

    Route::post('add_or_update_staff_type', [StaffTypeController::class, 'staffTypeSaveOrUpdate']);
    Route::post('assign_role', [UserController::class, 'assignRoleToUser']);
    Route::get('/all_block/{id}', [BlockController::class, 'allBlocks']);


});

// Route::get('users', [UserController::class, 'index'])->name('users.index');