<?php

use App\Http\Controllers\AboutUserController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactUserController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ProductUserController;
use App\Http\Controllers\Users\CheckoutController;
use App\Http\Controllers\Users\CommentUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Users\AccountUserController;

Route::get('admin/users/login', [LoginController::class, 'index'])->name('adminLogin');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group( function()
{
    Route::prefix('admin')->group(function()
    {
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);
        Route::get('logout', [MainController::class, 'logout']);
        #Menu
        Route::prefix('menus')->group(function()
        {
            Route::get('add',[MenuController::class,'create']);
            Route::post('add',[MenuController::class, 'store']);
            Route::get('list',[MenuController::class, 'index']);
            Route::get('edit/{menu}',[MenuController::class, 'show']);
            Route::post('edit/{menu}',[MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
            Route::DELETE('selected-menu', [MenuController::class, 'deleteAll'])->name('menu.delete');
        });

        #Product
        Route::prefix('products')->group(function(){
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
            Route::DELETE('selected-product', [ProductController::class, 'deleteAll'])->name('product.delete');
        });

        #Upload
        Route::post('upload/services', [UploadController::class, 'store']);


        #Silder
        Route::prefix('sliders')->group(function(){
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });

        #Order
        Route::prefix('orders')->group(function(){
            Route::get('/', [OrderController::class, 'index'])->name('order.index');
            Route::get('/detail/{order}', [OrderController::class, 'show'])->name('order.show');
            Route::get('/update-status/{order}', [OrderController::class, 'update'])->name('order.update');
        });

        #Statistics = Thống Kê
        Route::prefix('statistics')->group(function(){
            Route::get('/', [StatisticsController::class, 'index'])->name('statistics.index');
            Route::get('/orders', [StatisticsController::class, 'index2'])->name('statistics.index2');
        });

        #Promotion
        Route::prefix('promotion')->group(function(){
            Route::get('add', [PromotionController::class, 'create'])->name('create_promotion');
            Route::post('add', [PromotionController::class, 'store']);
            Route::get('list', [PromotionController::class, 'index'])->name('index_promotion');
            Route::get('edit/{promotion}', [PromotionController::class, 'show']);
            Route::post('edit/{promotion}', [PromotionController::class, 'update']);
            Route::DELETE('destroy', [PromotionController::class, 'destroy']);
        });

        #Comment
        Route::prefix('comment')->group(function () {
            Route::get('list', [CommentController::class, 'index'])->name('indexComment');
            Route::DELETE('destroy', [CommentController::class, 'destroy'])->name('destroyComment');
        });

        #Contact
        Route::prefix('contact')->group(function () {
            Route::get('list', [ContactController::class, 'index'])->name('indexContact');
            Route::DELETE('destroy', [ContactController::class, 'destroy'])->name('destroyContact');
        });

        #Customer
        Route::prefix('customer')->group(function () {
            Route::get('list', [CustomerController::class, 'index'])->name('indexCustomer');
        });
    });
});


Route::get('/filter-by-date', [StatisticsController::class, 'index'])->name('statistics.index');
Route::post('/filter-by-date',[StatisticsController::class, 'filter_by_date'])->name('statistics');

Route::get('/danh-muc/{id}-{slug}.html', [\App\Http\Controllers\MenuController::class, 'index']);
Route::get('/san-pham/{id}-{slug}.html', [ProductDetailController::class, 'index']);


Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('main');

# Router User---------------------------------------------------------------------------------------------
Route::prefix('users')->group(function () {
    Route::get('search', [ProductUserController::class, 'searchProduct'])->name('searchProduct');

    # Login Account -> done
    Route::get('login', [AccountUserController::class, 'login'])->name('login');
    Route::post('login', [AccountUserController::class, 'check_loginAccount'])->name('loginAccount');

    # Create Account User
    # Register Account -> done
    Route::get('register', [AccountUserController::class, 'register'])->name('register');
    Route::post('register', [AccountUserController::class, 'check_registerAccount'])->name('createAccount');
    Route::get('verify_account/{email}', [AccountUserController::class, 'verify_account'])->name('verify_account');

    # Logout Account -> done
    Route::get('logout', [App\Http\Controllers\Users\AccountUserController::class, 'logout']);

    Route::group(['middleware' => 'customer'], function ()
    {
        #Profile -> done
        Route::get('profile', [App\Http\Controllers\Users\AccountUserController::class, 'profile'])->name('user.profile');
        Route::post('profile', [App\Http\Controllers\Users\AccountUserController::class, 'check_profile']);

        #Change_password -> done
        Route::get('change_password', [App\Http\Controllers\Users\AccountUserController::class, 'change_password'])->name('change_password');
        Route::post('change_password', [App\Http\Controllers\Users\AccountUserController::class, 'check_change_password']);
    });

    #forgot_password
    Route::get('forgot_password', [App\Http\Controllers\Users\AccountUserController::class, 'forgot_password'])->name('forgot_password');
    Route::post('forgot_password', [App\Http\Controllers\Users\AccountUserController::class, 'check_forgot_password']);

    #reset_password
    Route::get('reset_password/{token}', [App\Http\Controllers\Users\AccountUserController::class, 'reset_password'])->name('account.reset_password');
    Route::post('reset_password/{token}', [App\Http\Controllers\Users\AccountUserController::class, 'check_reset_password']);

    #Comment -> done
    Route::post('comment/{product_id}', [CommentUserController::class, 'comment'])->name('commentUser');
    Route::get('comment/delete/{product_id}/{comment_id}', [CommentUserController::class, 'delete'])->name('commentDelete');

    #Contact
    Route::prefix('contact')->group(function (){
        Route::get('/', [ContactUserController::class, 'index'])->name('contact');
        Route::post('/send',[ContactUserController::class, 'sendContact'])->name('contactAdd');
    });

    Route::get('about', [AboutUserController::class, 'about'])->name('about');

});

Route::get('user/product', [App\Http\Controllers\ProductUserController::class, 'index'])->name('index.product');
Route::get('user/productDetail', [App\Http\Controllers\ProductDetailController::class, 'index']);

    Route::prefix('carts')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('cart.index');
        Route::get('/add/{product}', [CartController::class, 'add'])->name('cart.add');
        Route::get('/delete/{product}', [CartController::class, 'delete'])->name('cart.delete');
        Route::get('/update/{product}', [CartController::class, 'update'])->name('cart.update');
        Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
        Route::DELETE('/selected-cart', [CartController::class, 'deleteAll'])->name('cart.delete');
    });

    Route::prefix('order')->group(function () {
        Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('order.checkout');
        Route::post('/checkout', [CheckoutController::class, 'pos_checkout']);
        Route::get('/verify/{token}', [CheckoutController::class, 'verify'])->name('order.verify');
        Route::get('/history', [CheckoutController::class, 'history'])->name('order.history');
        Route::get('/detail/{order}', [CheckoutController::class, 'detail'])->name('order.detail');
        Route::post('/vnpay', [CheckoutController::class, 'vnpay'])->name('order.vnpay');
    });
//});






