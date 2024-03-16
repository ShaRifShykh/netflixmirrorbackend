<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Series;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all()->count();
        $movies = Movie::all()->count();
        $series = Series::all()->count();

        return view("admin.pages.dashboard.dashboard", [
            "users" => $users,
            "movies" => $movies,
            "series" => $series,
        ]);
    }
}
