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
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\ReceiptTypeController;
use App\Http\Controllers\UnitCategoryController;
use App\Http\Controllers\StaffTypeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UnitOwnerController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ApploginController;
use App\Http\Controllers\ReportController;

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
    Route::resource('receipts', ReceiptController::class);
    Route::resource('receipt_types', ReceiptTypeController::class);
    Route::resource('units', UnitController::class);
    Route::resource('research', ResearchController::class);
    Route::resource('analyst', AnalystController::class);
    Route::resource('products', ProductController::class);
    Route::resource('unit_owners', UnitOwnerController::class);
    Route::post('unit_owners_update', [UnitController::class, 'unitOwnerUpate']);
    Route::post('resideny-update', [UnitController::class, 'residenyUpdate']);
    Route::resource('expenses', ExpenseController::class);

    Route::post('add_or_update_staff_type', [StaffTypeController::class, 'staffTypeSaveOrUpdate']);
    Route::post('assign_role', [UserController::class, 'assignRoleToUser']);
    Route::post('add-receipt', [ReceiptController::class, 'addReceipt']);
    Route::post('receipt-status', [ReceiptController::class, 'updateStatus']);

    //  GET ROUTES
    Route::get('get-units', [ReceiptController::class, 'getUnits']);
    // Route::get('/all_block/{id}', [BlockController::class, 'allBlocks']);
    Route::get('/all_block/{id}', [HomeController::class, 'allBlocks']);
    Route::get('/freez-voucher/{id}', [ExpenseController::class, 'feezExpenseVoucher']);


    Route::get('/print-receipt/{id}', [ReceiptController::class, 'printView']);
    Route::get('/print-receipt-new/{id}', [ReceiptController::class, 'downloadReceipt']);
    Route::get('/print-expense/{id}', [ExpenseController::class, 'printView']);


    //  Report Controller
    
    Route::get('/defaulter-report', [ReportController::class, 'defaulter']);
     Route::get('/defaulter-print', [ReportController::class, 'defaulterPrint']);


    Route::get('/receivable-report', [ReportController::class, 'index']);
    Route::get('/receivable-print', [ReportController::class, 'printReport']);

});





Route::get('/api/login', [ApploginController::class, 'login']);
Route::get('/api/get-receipts', [ApploginController::class, 'getReceipts']);
Route::any('api/logout', [apploginController::class, 'logout']);


// Process For Fee Receivable
Route::get('/api/receivable-process', [ApploginController::class, 'receivableProcess']);

// Route::middleware('cors')->group(function(){
// Route::group(['middleware' => ['jwt.verify']],   function() {
    
// Route::any('api/logout', [apploginController::class, 'logout']);


//     });
// });



// Route::get('users', [UserController::class, 'index'])->name('users.index');