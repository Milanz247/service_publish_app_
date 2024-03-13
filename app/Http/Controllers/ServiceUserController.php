<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Review;
use App\Models\Service;
use App\Models\ServiceImg;
use App\Models\ServiceRequest;
use App\Models\Slider;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\ServerBag;

class ServiceUserController extends Controller
{
    public function viewAbout()
    {
        return view('serviceuser.about');
    }

    public function viewHome()
    {
        $users = Service::distinct()->pluck('service_user_id')->toArray();
        $foundUsers = User::whereIn('id', $users)->get();

        $locations = Service::distinct()->pluck('service_location')->toArray();
        $categories = Category::all();

        $slider = Slider::where('status', 1)->take(6)->get();

        return view('serviceuser.index')->with(compact('foundUsers', 'categories', 'locations', 'slider'));
    }

    public function viewDashboard()
    {
        $jobsCount = ServiceRequest::where('status', 'complete')
            ->where('service_user_id', Auth::user()->id)
            ->count();

        $newjobs = ServiceRequest::where('status', 'new')
            ->where('service_user_id', Auth::user()->id)
            ->count();

        return view('serviceuser.profile_section.dashboard', compact('jobsCount', 'newjobs'));
    }

    public function viewReviews()
    {
        $reviews = Review::with('user')->where('service_user_id', Auth::user()->id)->get();
        return view('serviceuser.profile_section.review', compact('reviews'));
    }


    //  <--------------------------------------------------------- Service User Profile Start ------------------------------------------------------------------->
    public function viewProfile()
    {
        return view('serviceuser.profile_section.profile');
    }

    public function viewSetting(Request $request)
    {

        return view('serviceuser.profile_section.setting', [

            'user' => $request->user(),
            'subcategories' => SubCategory::all(),
        ]);
    }

    public function updateProfileImage(Request $request)
    {
        try {

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $id = Auth::user()->id;
            $user = User::find($id);

            if ($user->image) {
                $previousImagePath = public_path('images/user_profile/') . $user->image;
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }

            $imageName = time() . '.' . $request->image->extension();

            $resizedImage = Image::make($request->image)->fit(150, 150)->encode($request->image->extension());

            $resizedImage->save(public_path('images/user_profile/') . $imageName);

            $user->image = $imageName;
            $user->save();

            $notification = array(
                'message' => 'Image Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();


            $errorNotification = [
                'message' => 'An error occurred: ' . $errorMessage,
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($errorNotification);
        }
    }

    public function updateProfile(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'userName' => 'nullable|string|max:255',
                'emailAddress' => 'nullable|string|email|max:255',
                'phone' => 'nullable|string|max:255'
            ]);

            $skillJson = json_encode($request->skill);
            $langJson = json_encode($request->lang);

            $id = Auth::user()->id;
            $user = User::find($id);
            $user->name = $validatedData['userName'];
            $user->email = $validatedData['emailAddress'];
            $user->phone = $validatedData['phone'];
            $user->skill_categories = $skillJson;
            $user->languages = $langJson;
            $user->location = $request->location;
            $user->pay_rate = $request->payrate;
            $user->fname = $request->firstName;
            $user->lname = $request->lastName;
            $user->description = $request->description;
            $user->dob = $request->dob;
            $user->member_since = \Carbon\Carbon::now();

            $user->save();

            $notification =  [
                'message' => 'Profile Update Successfully',
                'alerttype' => 'success'
            ];

            return $notification;
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
            $errorNotification = [
                'message' => 'An error occurred: ' . $errorMessage,
                'alerttype' => 'error'
            ];
            return $errorNotification;
        }
    }
    //  <--------------------------------------------------------- Service User Profile End ------------------------------------------------------------------->


    //  <--------------------------------------------------------- Service User register Service Start ------------------------------------------------------------------->
    public function viewServiceSection()
    {

        $services = Service::with('category', 'subcategory')->where('service_user_id', Auth::user()->id)->get();
        $categories = Category::get();
        return view('serviceuser.profile_section.service_section')->with(compact('categories', 'services'));
    }

    public function registerService(Request $request)
    {

        $service_id = Service::insertGetId([
            'service_location' =>  $request->service_location,
            'service_user_id' => Auth::user()->id,
            'description' => $request->service_discription,
            'service_category_id' => $request->job_category,
            'service_subcategory_id' => $request->job_subcategory,
            'phone' => $request->phone,
            'created_at' => Carbon::now(),
        ]);


        //   ////////// Multiple Image Upload Start ///////////

        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('frontend/service_img/' . $make_name);
            $uploadPath = 'frontend/service_img/' . $make_name;
            ServiceImg::insert([

                'service_id' => $service_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),

            ]);
        }
        $notification = array(
            'message' => 'Registred Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function deleteService(Request $request)
    {

        Service::findOrFail($request->id)->delete();

        $images = ServiceImg::where('service_id', $request->id)->get();

        //// Multi Image Delete ////

        foreach ($images as $img) {
            unlink($img->photo_name);
            ServiceImg::where('service_id', $request->id)->delete();
        }


        $notification = array(
            'message' => ' Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    //  <--------------------------------------------------------- Service User register Service End ------------------------------------------------------------------->



    //  <--------------------------------------------------------- Service User Order List Start ------------------------------------------------------------------->
    public function viewOrderList()
    {
        $statuses = ['new', 'accept', 'decline', 'complete'];
        $orders = [];

        foreach ($statuses as $status) {
            $orders[$status] = ServiceRequest::with('subcategory', 'user')
                ->where('status', $status)
                ->latest()
                ->get();
        }
        return view('serviceuser.profile_section.order_list', compact('orders'));
    }


    public function updateStatus(Request $request)
    {
        try {
            $id = $request->input('id');
            $data = ServiceRequest::findOrFail($id);
            $status = $request->input('status');

            if (!in_array($status, ['accept', 'decline', 'complete'])) {
                throw new \Exception("Invalid status");
            }
            $data->status = $status;
            $data->save();

            $notification =  [
                'message' => ucfirst($status) . " Successfully",
                'alerttype' => 'success'
            ];

            return response()->json($notification);
        } catch (\Exception $e) {
            $notification =  [
                'message' => 'An error occurred while performing the action.',
                'alerttype' => 'error'
            ];

            return response()->json($notification, 500);
        }
    }
    //  <--------------------------------------------------------- Service User Order List End ------------------------------------------------------------------->




    public function viewMessages()
    {
        return view('serviceuser.profile_section.messages');
    }
}
