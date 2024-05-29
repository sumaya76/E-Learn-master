<?php



use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ExamController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\UnpaidcourseController;
use App\Http\Controllers\Backend\PaidcourseController;
use App\Http\Controllers\Frontend\PaidcourseController as FrontendPaidcourseController;
use App\Http\Controllers\Backend\TeacherController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\BookController;

use App\Http\Controllers\Frontend\BookController as FrontendBookController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\SslCommerzPaymentController as FrontendSslCommerzPaymentController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\InvoiceController;
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
Route::get('/',[FrontendHomeController::class, 'home'])->name('home');
Route::get('/paidcourse/courses',[FrontendPaidcourseController::class, 'courses'])->name('courses');
Route::get('/paidcourse/paymentinfo/{id}',[FrontendPaidcourseController::class, 'paymentinfo'])->name('paymentinfo');
Route::get('/books', [FrontendBookController::class, 'books'])->name('books');
Route::get('/search-course',[FrontendHomeController::class,'search'])->name('paidcourse.search');
Route::get('/single-paidcourse/{id}', [FrontendPaidcourseController::class, 'singlePaidcourseView'])->name('single.paidcourse');

Route::get('/paidcourse/enrollform/{id}', [FrontendPaidcourseController::class, 'enrollform'])->name('frontendenroll.form');
Route::post('/paidcourse/enroll/{id}', [FrontendPaidcourseController::class, 'enrollpaidcourse'])->name('enroll.paidcourse');
Route::get('/paidcourse/mycourse',[FrontendPaidcourseController::class, 'mycourselist'])->name('mycourse');

Route::get('/single-book/{id}', [FrontendBookController::class, 'singleBookView'])->name('single.book');
Route::get('/book/buyform/{id}', [FrontendBookController::class, 'bookbuyform'])->name('bookbuy.form');
Route::get('/registration',[CustomerController::class,'registration'])->name('customer.registration');
Route::post('/registration/store',[CustomerController::class,'store'])->name('customer.store');
Route::get('/login',[CustomerController::class,'login'])->name('customer.login');
Route::post('/dologin',[CustomerController::class,'dologin'])->name('customer.dologin');

Route::get('/product-under-cagtegory/{cat_id}',[FrontendHomeController::class,'productsUnderCategory'])->name('products.under.category');



//cart routes here
Route::get('/cart-view',[CartController::class,'viewCart'])->name('cart.view');
Route::get('/add-to-cart/{product_id}',[CartController::class,'addToCart'])->name('add.toCart');
Route::get('/checkout',[CartController::class,'checkout'])->name('checkout');
Route::post('/order-place',[OrderController::class, 'orderPlace'])->name('order.place');
// SSLCOMMERZ Start
Route::get('/example1', [FrontendSslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [FrontendSslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [FrontendSslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [FrontendSslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [FrontendSslCommerzPaymentController::class, 'success']);

Route::post('/fail', [FrontendSslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [FrontendSslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [FrontendSslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
Route::get('/invoice/{transactionId}', [InvoiceController::class, 'show'])->name('invoice');

Route::group(['middleware'=>'auth'],function(){
    
   

Route::get('/paidcourse/mycourse',[FrontendPaidcourseController::class, 'mycourselist'])->name('mycourse');



Route::get('/profile',[CustomerController::class,'profileview'])->name('profile.view');
Route::get('/profile-edit',[CustomerController::class,'profileedit'])->name('profile.edit');
Route::put('/profile-update',[CustomerController::class,'profileupdate'])->name('profile.update');
Route::get('/logout',[CustomerController::class,'logout'])->name('customer.logout');
Route::get('/buy-now/{product_id}',[OrderController::class,'buyNow'])->name('buy.now');
Route::get('/cancel-order/{product_id}',[OrderController::class,'cancelOrder'])->name('order.cancel');

});

















Route::group(['prefix'=>'admin'],function(){
    
Route::get('/login',[UserController::class,'loginForm'])->name('admin.login');
Route::post('/login-form-post',[UserController::class,'loginPost'])->name('admin.login.post');

Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware'=>'CheckAdmin'],function(){
    Route::get('/logout',[UserController::class, 'logout'])->name('admin.logout');

Route::get('/', [HomeController::class,'home'])->name('dashboard');
Route::get('/unpaid/list',[UnpaidcourseController::class,'list'])->name('unpaid.list');
Route::get('/unpaid/form',[UnpaidcourseController::class,'createform'])->name('unpaidcourse.form');
Route::post('/unpaid/store',[UnpaidcourseController::class,'store'])->name('unpaid.store');
Route::get('/paid/list',[PaidcourseController::class,'list'])->name('paid.list');
Route::get('/paid/form',[PaidcourseController::class,'createform'])->name('paidcourse.form');
Route::post('/paid/store',[PaidcourseController::class,'store'])->name('paid.store');
Route::get('/paid/view/{id}',[PaidcourseController::class,'view'])->name('paid.view');
Route::get('/paid/delete/{id}',[PaidcourseController::class,'delete'])->name('paid.delete');
Route::get('/paid/edit/{id}',[PaidcourseController::class,'edit'])->name('paid.edit');
Route::put('/paid/update/{id}',[PaidcourseController::class,'update'])->name('paid.update');
Route::get('/teacher/list',[TeacherController::class,'list'])->name('teacher.list');
Route::get('/teacher/delete/{id}',[TeacherController::class,'delete'])->name('teacher.delete');
Route::get('/teacher/edit/{id}',[TeacherController::class,'edit'])->name('teacher.edit');
Route::put('/teacher/update/{id}',[TeacherController::class,'update'])->name('teacher.update');
Route::get('/teacher/form',[TeacherController::class,'createform'])->name('teacher.form');
Route::post('/teacher/store',[TeacherController::class,'store'])->name('teacher.store');
Route::get('/student/list',[StudentController::class,'list'])->name('student.list');
Route::get('/student/form',[StudentController::class,'createform'])->name('student.form');
Route::post('/student/store',[StudentController::class,'store'])->name('student.store');
Route::get('/student/delete/{id}',[StudentController::class,'delete'])->name('student.delete');
Route::get('/orderpayment/list',[StudentController::class,'orderpaymentlist'])->name('orderpayment.list');
Route::get('/orderpayment/report/{id}',[StudentController::class,'orderpaymentreport'])->name('orderpayment.report');


Route::get('/enroll/list',[StudentController::class,'enrolllist'])->name('enroll.list');
Route::get('/enroll/form',[StudentController::class,'enrollform'])->name('enroll.form');
Route::post('/enroll/store',[StudentController::class,'enrollstore'])->name('enroll.store');
Route::get('/book/list',[BookController::class,'list'])->name('book.list');

Route::get('/book/view/{id}',[BookController::class,'view'])->name('book.view');
Route::get('/book/delete/{id}',[BookController::class,'delete'])->name('book.delete');
Route::get('/book/edit/{id}',[BookController::class,'edit'])->name('book.edit');
Route::put('/book/update/{id}',[BookController::class,'update'])->name('book.update');
Route::get('/book/form',[BookController::class,'createform'])->name('book.form');
Route::post('/book/store',[BookController::class,'store'])->name('book.store');
Route::get('/users/list',[UserController::class,'list'])->name('users.list');
Route::get('/users/form',[UserController::class,'form'])->name('users.form');
Route::post('/users/store',[UserController::class,'store'])->name('users.store');
Route::get('/exam/list',[ExamController::class,'list'])->name('exam.list');
    });
});
});