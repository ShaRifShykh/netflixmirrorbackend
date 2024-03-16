<?php

namespace App\Http\Controllers\Admin\Series;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        return view("admin.pages.series.index");
    }


    public function create(Request $request)
    {
        return view("admin.pages.series.add");
    }


    public function edit(Request $request, $id)
    {
        return view("admin.pages.series.edit", [
            "id" => $id
        ]);
    }
}
