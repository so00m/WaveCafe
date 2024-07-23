<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Beverage;


class FrontPageController extends Controller
{
    public function index(){

        $categories = Category::get();
        $beverages  = Beverage::get();

        //$specialItems = Beverage::where('special', 1)->get(); 
        // من خلال الصفحه لتجنب ارسال بيانات العمود دا مرتين الى الصفحة بدون داعي  special تم عرض ال

        return view('frontPages.index', compact('categories', 'beverages'));    //,'specialItems'));

    }
    
    
}
