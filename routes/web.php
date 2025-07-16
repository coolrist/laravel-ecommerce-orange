<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Common\HomeController;
use App\Http\Controllers\Common\UserDashboardController;
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

Route::controller(HomeController::class)->group(function () {
    $shop = __('common.shop.slug');
    $single_product = __('common.singleproduct.slug');
    $cart = __('common.cart.slug');
    $contact = __('common.contact.slug');

    Route::get("/", 'home');
    Route::get("/$shop", 'shop')->name('shop');
    Route::get("/$single_product/{product}", 'singleproduct')->name('singleproduct');
    Route::get("/$cart", 'cart')->name('cart');
    Route::get("/$contact", 'contact')->name('contact');
    Route::post("/add-to-cart", 'addtocart')->name('cart.add');
    Route::post("/update-quantity", 'updateqty')->name('cart.update');
    Route::post("/remove-from-cart", 'removefromcart')->name('cart.remove');
});

Route::middleware('auth.user')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        $login = __('common.login.slug');
        $register = __('common.register.slug');
        $checkout = __('common.checkout.slug');

        Route::get("/$login", 'login')->name('login');
        Route::get("/$register", 'register')->name('register');
        Route::match(['get', 'post'], "/$checkout", 'checkout')->name('checkout');
        Route::post("/place-order", 'placeorder')->name('placeorder');
    });

    $userdashboard = __('userdash.prefix');
    Route::controller(UserDashboardController::class)->prefix("/$userdashboard")->group(function () {
        $orderdetails = __('userdash.orderdetails.slug');
        $payment = __('userdash.payment.slug');

        Route::get("/", 'index')->name('user');
        Route::get("/$orderdetails/{order}", 'orderdetails')->name('user.orderdetails');
        Route::get("/$payment/{order}", 'payment')->name('user.payment');
        Route::post("/complete-payment", 'completepayment')->name('user.completepayment');
        Route::post("/access-account", 'accessaccount')->name('user.accessaccount');
        Route::post("/create-account", 'create')->name('user.create');
        Route::post("/change-password", 'changepassword')->name('user.changepassword');
        Route::get("/logout", 'logout')->name('user.logout');
    });
});

$admindashboard = __('admin.prefix');
Route::prefix("/$admindashboard")->middleware('auth.admin')->group(function () {
    $orders = __('resources.name.orders');
    $products = __('resources.name.products');
    $categories = __('resources.name.categories');

    Route::controller(AdminDashboardController::class)->group(function () {
        $login = __('admin.login.slug');
        $help = __('admin.help.slug');

        Route::get("/", 'index')->name('admin');
        Route::get("/$login", 'login')->name('admin.login');
        Route::get("/$help", 'help')->name('admin.help');
        Route::post("/access-account", 'accessaccount')->name('admin.accessaccount');
        Route::get("/logout", 'logout')->name('admin.logout');
    });
    Route::resource("/$products", ProductController::class)->names([
        'index' => 'products',
        'create' => 'products.create',
        'store' => 'products.store',
        'show' => 'products.show',
        'edit' => 'products.edit',
        'update' => 'products.update',
        'destroy' => 'products.destroy',
    ]); // Par defaut, tous les controlleurs avec ressource ont un nom de route par defaut
    Route::resource("/$orders", OrderController::class);
    Route::resource("/$categories", CategoryController::class);
});