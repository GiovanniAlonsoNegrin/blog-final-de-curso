<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AllPostController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'destroy'])->names('admin.users');

Route::resource('roles', RoleController::class)->except('show')->names('admin.roles');

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

Route::resource('tags', TagController::class)->except('show')->names('admin.tags');

Route::resource('posts', PostController::class)->names('admin.posts');

Route::get('post', [AllPostController::class, 'index'])->name('admin.allposts');

Route::resource('comment', CommentController::class)->except('create','store','show')->names('admin.comments');