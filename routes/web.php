<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('index');

Route::group([
    'as' => 'blog.',
    'prefix' => 'news'
], function () {
    // To blog page
    Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('index');
    // To single blog post
    Route::get('/{post:slug}', [\App\Http\Controllers\PostController::class, 'show'])->name('show');
});


Route::group([
    'as' => 'products.',
    'prefix' => 'store'
], function () {
    // To blog page
    Route::resource('', App\Http\Controllers\ProductController::class);
    Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('list');
    Route::get('{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('show');
});




Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/payments', function () {
    return view('indev');
});

Route::group([
    'as' => 'cart.',
], function () {
    Route::get('cart', [\App\Http\Controllers\CartController::class, 'cartList'])->name('list');
    Route::post('cart', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('store');
    Route::post('update-cart', [\App\Http\Controllers\CartController::class, 'updateCart'])->name('update');
    Route::post('remove', [\App\Http\Controllers\CartController::class, 'removeCart'])->name('remove');
    Route::post('clear', [\App\Http\Controllers\CartController::class, 'clearAllCart'])->name('clear');
});


Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {

    Route::get('/', [App\Http\Controllers\Admin\IndexController::class, 'index'])->name('index');

    Route::resource('/roles', App\Http\Controllers\Admin\RoleController::class);
    Route::post('/roles/{role}/permissions', [App\Http\Controllers\Admin\RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [App\Http\Controllers\Admin\RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');

    Route::resource('/permissions', App\Http\Controllers\Admin\PermissionController::class);
    Route::post('/permissions/{permission}/roles', [App\Http\Controllers\Admin\PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [App\Http\Controllers\Admin\PermissionController::class, 'removeRole'])->name('permissions.roles.remove');

    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/roles', [App\Http\Controllers\Admin\UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [App\Http\Controllers\Admin\UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [App\Http\Controllers\Admin\UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [App\Http\Controllers\Admin\UserController::class, 'revokePermission'])->name('users.permissions.revoke');

    Route::resource('/news', \App\Http\Controllers\Admin\PostController::class);
    Route::delete('/news/{post}', [\App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('posts.destroy');
});

require __DIR__ . '/auth.php';
