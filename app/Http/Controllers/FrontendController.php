<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FrontendController extends Controller
{

    public function welcome()
    {
        $users = Service::distinct()->pluck('service_user_id')->toArray();
        $foundUsers = User::whereIn('id', $users)->get();

        $locations = Service::distinct()->pluck('service_location')->toArray();
        $categories = Category::all();

        return view('frontend.home')->with(compact('foundUsers','categories','locations'));
    }


    public function getSubcategory(Request $request)
    {
        $categoryId = $request->input('category_id');
        $subcategories = SubCategory::where('category_id', $categoryId)->get();
        return response()->json(['subcategories' => $subcategories]);
    }

    public function riderctRegisterbalde($usertype)
    {

        return view('auth.register');
    }

    public function viewAbout()
    {
        return view('frontend.about');
    }

    public function viewContact()
    {
        return view('frontend.contact');
    }


}
