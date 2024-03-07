<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\ServiceRequest;
use App\Models\Service;
use App\Models\ServiceImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\ServerBag;

class UserController extends Controller
{
    public function viewHome()
    {
        return view('user.index');
    }

    public function viewAbout()
    {
        return view('user.about');
    }

    public function viewSetting(Request $request)
    {
        return view('user.profile_section.setting', [

            'user' => $request->user(),
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

        return view('user.single_service_view')->with(compact('services', 'user'));
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
        // dd($request);
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
            'message' => ' Send Request Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}
