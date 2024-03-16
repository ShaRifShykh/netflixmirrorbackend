<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\SignInController;
use App\Http\Controllers\Api\Auth\SignUpController;
use App\Http\Controllers\Api\Movie\MovieController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\Series\EpisodeController;
use App\Http\Controllers\Api\Series\SeriesController;
use Illuminate\Support\Facades\Route;



Route::get('auth-failed', function () {
    return response('unauthenticated', 401);
})->name('authFailed');


Route::group(['as' => 'api.'], function () {
    // Auth Routes
    Route::group(['as' => 'auth.', 'prefix' => 'auth'], function () {
        // Sign In Routes
        Route::post("/sign_in", [SignInController::class, "index"]);

        // Sign Up Routes
        Route::post("/sign_up", [SignUpController::class, "index"]);

        Route::group(["middleware" => "auth:api"], function () {
            Route::get("/user", [AuthController::class, "user"]);
            Route::get("/logout", [AuthController::class, "logout"]);
        });
    });


    // Main Routes
    Route::group(["middleware" => "auth:api"], function () {
        // Movies Routes
        Route::get("/trending_movies", [MovieController::class, "trendingMovies"]);
        Route::get("/top_movies", [MovieController::class, "topMovies"]);
        Route::get("/random_movies", [MovieController::class, "randomMovies"]);


        // Series Routes
        Route::get("/top_series", [SeriesController::class, "topSeries"]);
        Route::get("/random_series", [SeriesController::class, "randomSeries"]);


        // Episodes Routes
        Route::get("/episode/{id}", [EpisodeController::class, "getEpisodes"]);


        // Series Routes
        Route::get("/search", [SearchController::class, "search"]);
    });
});
