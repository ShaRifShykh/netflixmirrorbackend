<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Auth\SignInController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Episode\EpisodeController;
use App\Http\Controllers\Admin\Movie\MovieController;
use App\Http\Controllers\Admin\Series\SeriesController;
use Illuminate\Support\Facades\Route;



Route::group(['namespace' => 'Admin', 'as' => 'admin.'], function () {
    // Admin Auth Routes
    Route::group(['namespace' => 'Auth', 'prefix' => 'auth', 'as' => 'auth.'], function () {
        Route::get("/sign_in", [SignInController::class, "signInView"])->name("signInView");
        Route::get("/logout", [AuthController::class, "logout"])->name("logout")
            ->middleware("auth:admin");
    });

    // Main Routes with Middleware
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get("/dashboard", [DashboardController::class, "index"])
            ->name("dashboard");


        // Movies Routes
        Route::group(['namespace' => 'Movies', 'prefix' => 'movies', 'as' => 'movies.'], function () {
            Route::get("/", [MovieController::class, "index"])->name("index");
            Route::get("add", [MovieController::class, "create"])->name("add");
            Route::post("insert", [MovieController::class, "insert"])->name("insert");
            Route::get("edit/{id}", [MovieController::class, "edit"])->name("edit");
        });


        // Series Routes
        Route::group(['namespace' => 'Series', 'prefix' => 'series', 'as' => 'series.'], function () {
            Route::get("/", [SeriesController::class, "index"])->name("index");
            Route::get("add", [SeriesController::class, "create"])->name("add");
            Route::get("edit/{id}", [SeriesController::class, "edit"])->name("edit");
        });


        // Episodes Routes
        Route::group(['namespace' => 'Episodes', 'prefix' => 'episodes', 'as' => 'episodes.'], function () {
            Route::get("/", [EpisodeController::class, "index"])->name("index");
            Route::get("add", [EpisodeController::class, "create"])->name("add");
            Route::post("insert", [EpisodeController::class, "insert"])->name("insert");
            Route::get("edit/{id}", [EpisodeController::class, "edit"])->name("edit");
        });
    });
});
