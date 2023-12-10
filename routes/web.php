<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website\WebsiteController;
use App\Http\Controllers\Website\PolicyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfilePhotoController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ExtraController;
use App\Http\Controllers\Website\SearchController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SubscribeController;
use Illuminate\Support\Facades\Route;



Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
Route::get('/blogs/{id}', [WebsiteController::class, 'blogs'])->name('blogs');
Route::get('/blogs/tag/{id}', [WebsiteController::class, 'blogTag'])->name('blog.tag');
Route::get('/details/{id}', [WebsiteController::class, 'details'])->name('details');
Route::get('/author', [WebsiteController::class, 'author'])->name('author');

//  Search

Route::get('/search/result', [SearchController::class, 'searchResult'])->name('search.result');

//Terms, Privacy and Return Polices

Route::get('/terms',[PolicyController::class,'terms'])->name('policy.terms');
Route::get('/privacy',[PolicyController::class,'privacy'])->name('policy.privacy');


Route::middleware(['userBan'])->group(function () {

    Route::middleware(['auth', 'verified'])->group(function () {

        Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

        //    User Middleware

        Route::middleware(['user'])->group(function () {

            // Comment

            Route::resource('/comment',CommentController::class);
            Route::get('/comment/view',[CommentController::class, 'view'])->name('comment.view');

        });

        //    Admin Middleware

        Route::middleware(['admin'])->group(function () {

            //        User

            Route::get('/users',[UserController::class,'users'])->name('users');
            Route::get('/users-detail/{id}',[UserController::class,'usersDetail'])->name('user.detail');
            Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('delete.user');
            Route::get('/change-role/{id}',[UserController::class,'changeRole'])->name('change.role');
            Route::get('/change-ban-status/{id}',[UserController::class,'changeBanStatus'])->name('change.ban.status');

        //    Category

            Route::resource('/category',CategoryController::class);
            Route::get('/change-category-status/{id}',[CategoryController::class,'changeCategoryStatus'])->name('change.status.category');

            //    Tag

            Route::resource('/tag',TagController::class);
            Route::get('/change-tag-status/{id}',[TagController::class,'changeTagStatus'])->name('change.status.tag');

            //    Blog

            Route::resource('/blog',BlogController::class);
            Route::get('/change-blog-status/{id}',[BlogController::class,'changeBlogStatus'])->name('change.status.blog');
            Route::get('/change-home-blog-status/{id}',[BlogController::class,'changeHomeBlogStatus'])->name('change.status.home.blog');
            Route::get('/change-popular-blog-status/{id}',[BlogController::class,'changePopularBlogStatus'])->name('change.status.popular.blog');

            //    Blog

            Route::resource('/extra',ExtraController::class);
            Route::get('/change/blog/extra/{id}',[ExtraController::class,'changeExtraStatus'])->name('change.status.extra');

            //    Comment

            Route::get('/change/comment/{id}',[CommentController::class,'changeCommentStatus'])->name('change.status.comment');

            // Contact Us

            Route::resource('/contact-us', ContactController::class);
            Route::get('/contact/status/{id}',[ContactController::class,'changeStatusContact'])->name('status.contact');

            // Subscribe Newsletter

            Route::resource('/subscribe', SubscribeController::class);
            Route::get('/subscribe/status/{id}',[SubscribeController::class,'changeStatusSubscribe'])->name('status.subscribe');


        });


    });


    Route::middleware('auth')->group(function () {

//            profile show

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        //    Profile Photo manage

        Route::resource('/photo', ProfilePhotoController::class);
        Route::get('/profile/{id}', [ProfilePhotoController::class, 'show'])->name('profile.show');

    });

});

require __DIR__.'/auth.php';
