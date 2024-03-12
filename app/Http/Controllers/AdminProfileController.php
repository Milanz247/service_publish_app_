<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function viewProfileEdit()
    {

        $admin = Auth::user();
        return view('admin.admin_profile_edit', compact('admin'));
    }

    public function profileUpdate(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'name' => 'nullable|string|max:255',
                'email' => 'nullable|string|email|max:255',
                'phone' => 'nullable|string|max:255'
            ]);

            $id = Auth::user()->id;
            $admin = Admin::find($id);

            $admin->name = $validatedData['name'];
            $admin->lname = $request->lname;
            $admin->gender = $request->gender;
            $admin->birth = $request->birth;
            $admin->email = $validatedData['email'];
            $admin->phone = $validatedData['phone'];
            $admin->save();

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
            return $errorNotification;
        }
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {

            $notification = [
                'message' => 'The provided password does not match your current password',
                'alert-type' => 'error'
            ];
            return $notification;
        }

        $user->password = Hash::make($request->password);
        $user->save();
        $notification = array(
            'message' => ' Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
