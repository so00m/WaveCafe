<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Beverage;


class FrontPageController extends Controller
{
    public function index(){

        $categories = Category::all();
        $beverages  = Beverage::all();
        return view('frontPages.index', compact('categories', 'beverages'));

    }
    
}
