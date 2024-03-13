<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use App\Models\Slider;
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

        $slider = Slider::where('status', 1)->take(6)->get();

        return view('frontend.home')->with(compact('foundUsers', 'categories', 'locations', 'slider'));
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

    public function viewService()
    {
        $locations = Service::distinct()->pluck('service_location')->toArray();
        $categories = Category::all();
        $users = Service::distinct()->pluck('service_user_id')->toArray();
        $foundUsers = User::whereIn('id', $users)->get();

        return view('frontend.services')->with(compact('foundUsers', 'locations', 'categories'));
    }

    public function filterService(Request $request)
    {
        $category = $request->input('job_category');
        $subcategory = $request->input('job_subcategory');
        $location = $request->input('service_location');

        $query = Service::query();

        if ($category) {
            $query->where('service_category_id', $category);
        }

        if ($subcategory) {
            $query->where('service_subcategory_id', $subcategory);
        }
        if ($location) {
            $query->where('service_location', $location);
        }
        $users = $query->distinct()->pluck('service_user_id')->toArray();
        $locations = Service::distinct()->pluck('service_location')->toArray();
        $categories = Category::all();
        $foundUsers = User::whereIn('id', $users)->get();

        return view('frontend.services')->with(compact('foundUsers', 'locations', 'categories','category','subcategory','location'));
    }
}
