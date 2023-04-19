<?php

use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function (){
    Route::redirect('/', '/user/posts')->name('user');

    Route::get('/posts', [PostController::class, 'index' ])->name('user.posts.index')->middleware('auth');
    Route::get('/posts/create', [PostController::class, 'create' ])->name('user.posts.create');
    Route::post('/posts', [PostController::class, 'store' ])->name('user.posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show' ])->name('user.posts.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit' ])->name('user.posts.edit');
    Route::put('/posts/{post}/edit', [PostController::class, 'update' ])->name('user.posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'delete' ])->name('user.posts.delete');
    Route::put('/posts/{post}/like', [PostController::class, 'like' ])->name('user.posts.like');

    Route::get('/categories', [CategoryController::class, 'index' ])->name('user.categories.index')->middleware('auth');
    Route::get('/categories/create', [CategoryController::class, 'create' ])->name('user.categories.create');
    Route::post('/categories', [CategoryController::class, 'store' ])->name('user.categories.store');
    Route::get('/categories/{category}', [CategoryController::class, 'show' ])->name('user.categories.show');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit' ])->name('user.categories.edit');
    Route::put('/categories/{category}/edit', [CategoryController::class, 'update' ])->name('user.categories.update');
});
