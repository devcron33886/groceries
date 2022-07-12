<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::get('/', \App\Http\Controllers\WelcomeController::class)->name('welcome');
Route::get('shop/product/{product:slug}',\App\Http\Controllers\ProductShowController::class)->name('product-show');
Route::get('shop/category/{category:slug}',\App\Http\Controllers\CategoryShowController::class)->name('category-show');

Route::get('/shop/bag',\App\Http\Controllers\ShoppingCartController::class)->name('cart');
Route::get('/shop/checkout',\App\Http\Controllers\CheckoutController::class)->middleware('auth')->name('shop.checkout');
Route::get('/orders',\App\Http\Controllers\OrderController::class)->name('orders');
Route::get('/orders/{order:uuid}/confirmation',\App\Http\Controllers\OrderConfirmationController::class)->name('orders.conformation');
Route::get('/shop',ShopController::class)->name('shop');
Route::get('/contact-us',ContactUsController::class)->name('contact');

Route::get('/dashboard', function (Request $request) {
    $orders=$request->user()->orders()->latest()
            ->with('variations.product','variations.media','variations.ancestorsAndSelf','shippingtype')
            ->get();
    return view('dashboard',compact('orders'));
})->middleware(['auth'])->name('dashboard');

Route::get('/guidelines', function () {
    return view('guidelines');
})->name('guidelines');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::post('categories/media', 'CategoryController@storeMedia')->name('categories.storeMedia');
    Route::post('categories/ckmedia', 'CategoryController@storeCKEditorImages')->name('categories.storeCKEditorImages');
    Route::resource('categories', 'CategoryController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Variation
    Route::delete('variations/destroy', 'VariationController@massDestroy')->name('variations.massDestroy');
    Route::post('variations/media', 'VariationController@storeMedia')->name('variations.storeMedia');
    Route::post('variations/ckmedia', 'VariationController@storeCKEditorImages')->name('variations.storeCKEditorImages');
    Route::resource('variations', 'VariationController');

    // Stock
    Route::delete('stocks/destroy', 'StockController@massDestroy')->name('stocks.massDestroy');
    Route::resource('stocks', 'StockController');

    // Payment Method
    Route::delete('payment-methods/destroy', 'PaymentMethodController@massDestroy')->name('payment-methods.massDestroy');
    Route::resource('payment-methods', 'PaymentMethodController');

    // Shipping Type
    Route::delete('shipping-types/destroy', 'ShippingTypeController@massDestroy')->name('shipping-types.massDestroy');
    Route::resource('shipping-types', 'ShippingTypeController');

    // Shipping Address
    Route::delete('shipping-addresses/destroy', 'ShippingAddressController@massDestroy')->name('shipping-addresses.massDestroy');
    Route::resource('shipping-addresses', 'ShippingAddressController');

    // Order
    Route::delete('orders/destroy', 'OrderController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrderController');

    // Event
    Route::delete('events/destroy', 'EventController@massDestroy')->name('events.massDestroy');
    Route::post('events/media', 'EventController@storeMedia')->name('events.storeMedia');
    Route::post('events/ckmedia', 'EventController@storeCKEditorImages')->name('events.storeCKEditorImages');
    Route::resource('events', 'EventController');

    // Client List
    Route::delete('client-lists/destroy', 'ClientListController@massDestroy')->name('client-lists.massDestroy');
    Route::resource('client-lists', 'ClientListController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});


require __DIR__.'/auth.php';
