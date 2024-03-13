<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Review;
use App\Models\Reviewimg;
use App\Models\ServiceRequest;
use App\Models\Service;
use App\Models\ServiceImg;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\ServerBag;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function viewHome()
    {
        $users = Service::distinct()->pluck('service_user_id')->toArray();
        $foundUsers = User::whereIn('id', $users)->get();

        $locations = Service::distinct()->pluck('service_location')->toArray();
        $categories = Category::all();

        $slider = Slider::where('status', 1)->take(6)->get();

        return view('user.index')->with(compact('foundUsers', 'categories', 'locations', 'slider'));

    }

    public function viewAbout()
    {
        return view('user.about');
    }

    public function viewContact()
    {
        return view('user.contact');
    }

    public function viewSetting(Request $request)
    {
        return view('user.profile_section.setting', [

            'user' => $request->user(),
        ]);
    }

    public function viewAppliedService()
    {
        $statuses = ['new', 'decline', 'accept', 'complete'];
        $orders = [];
        $serviceUsers = [];
        $reviewexist = [];
        $id = Auth::user()->id;

        foreach ($statuses as $status) {
            $orders[$status] = ServiceRequest::with('subcategory', 'user')
                ->where('status', $status)
                ->where('user_id', $id)
                ->latest()
                ->get();

            // Retrieve service user for each service request
            foreach ($orders[$status] as $order) {
                $sid = $order->service_user_id;
                $serviceUsers[$order->id] = User::find($sid);
                $id = $order->id;

                $reviewexist[$order->id] = Review::where('service_id', $id)->exists();
            }
        }

        return view('user.profile_section.service_order_list', compact('orders', 'serviceUsers', 'reviewexist'));
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



    public function viewService()
    {

        $locations = Service::distinct()->pluck('service_location')->toArray();
        $categories = Category::all();
        $users = Service::distinct()->pluck('service_user_id')->toArray();
        $foundUsers = User::whereIn('id', $users)->get();

        return view('user.service')->with(compact('foundUsers', 'locations', 'categories'));
    }

    public  function viewSrviceProfile($id)
    {
        $services = Service::with('user', 'subcategory', 'serviceImages')
            ->where('service_user_id', $id)
            ->get();

        $user = User::find($id);

        $reviews = Review::with('user')->where('service_user_id', $id)->get();

        return view('user.single_service_view')->with(compact('services', 'user', 'reviews'));
    }

    public  function getRegistration(Request $request)
    {
        $userId = $request->input('userId');

        $services = Service::with('subcategory')
            ->where('service_user_id', $userId)
            ->get();

        return response()->json($services);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'job_subcategory' => 'required',
                'title' => 'required',
                'location' => 'required',
            ]);

            $urgency = $request->has('urgent_job') ? 1 : 0;
            $schedule_job = $request->has('schedule_job') ? 1 : 0;

            $servicerequest = new ServiceRequest();
            $servicerequest->job_subcategory_id = $validatedData['job_subcategory'];
            $servicerequest->title = $validatedData['title'];
            $servicerequest->location = $validatedData['location'];
            $servicerequest->description = $request->description;
            $servicerequest->schedule_job = $schedule_job;
            $servicerequest->budget = $request->budget;
            $servicerequest->urgent_job = $urgency;
            $servicerequest->status = 'new';
            $servicerequest->service_user_id = $request->service_user_id;
            $servicerequest->user_id = $request->user_id;
            $servicerequest->schedule_date = $request->schedule_date;

            $servicerequest->save();

            $notification = array(
                'message' => 'Send Request Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } catch (ValidationException $e) {
            // Handle validation errors
            $notification = array(
                'message' => $e->validator->errors()->first(),
                'alert-type' => 'error'
            );
            return redirect()->back()->withInput()->with($notification);
        } catch (\Exception $e) {
            // Handle other exceptions here
            $notification = array(
                'message' => 'An error occurred while processing your request',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function deleteApplyService(Request $request)
    {
        try {
            $id = $request->input('id');
            $data = ServiceRequest::findOrFail($id);
            $data->delete(); // Deleting the record instead of saving it

            $notification = [
                'message' => "Delete Successfully",
                'alerttype' => 'success'
            ];

            return response()->json($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => 'An error occurred while performing the action.',
                'alerttype' => 'error'
            ];

            return response()->json($notification, 500);
        }
    }

    public function addReview(Request $request)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',

        ]);

        $review_id = Review::insertGetId([
            'service_id' => $request->service,
            'user_id' => Auth::user()->id,
            'service_user_id' => $request->service_user,
            'rating' =>  $validatedData['rating'],
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);


        //   ////////// Multiple Image Upload Start ///////////

        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('frontend/review_imgs/' . $make_name);
            $uploadPath = 'frontend/review_imgs/' . $make_name;
            Reviewimg::insert([

                'review_id' => $review_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),

            ]);
        }
        $notification = [
            'message' => "Successfully",
            'alerttype' => 'success'
        ];

        return response()->json($notification);
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

        return view('user.service')->with(compact('foundUsers', 'locations', 'categories','category','subcategory','location'));
    }
}
