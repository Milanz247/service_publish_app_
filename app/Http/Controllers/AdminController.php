<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Slider;
use App\Models\SubCategory;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{

    //  <--------------------------------------------------------- Ctegory Part Start ------------------------------------------------------------------->
    public function viewCategory()
    {
        $catregory = Category::get();
        return view('admin.category.index', compact('catregory'));
    }

    public function categoryDelete($id)
    {

        // Find the category by ID
        $category = Category::findOrFail($id);

        // Delete the category
        $category->delete();

        $notification = array(
            'message' => 'Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function categoryStore(Request $request)
    {

        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        // Create a new category instance
        $category = new Category();
        $category->name = $validatedData['category_name'];
        $category->icon = $request->category_icon;
        $category->save();

        $notification = array(
            'message' => 'Category created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function getCategoryData($id)
    {
        $category = Category::findOrFail($id);
        return response()->json(['category' => $category]);
    }

    public function categoryUpdate(Request $request)
    {
        $categoryId = $request->input('category_id');
        $category = Category::findOrFail($categoryId);


        $category->name = $request->input('category_name');
        $category->icon = $request->input('category_icon');

        $category->save();

        $notification = array(
            'message' => 'Category updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    //  <--------------------------------------------------------- Ctegory Part End ------------------------------------------------------------------->



    //  <--------------------------------------------------------- SubCtegory Part  Start ------------------------------------------------------------------->
    public function viewsubCategory()
    {
        $subcatregory = SubCategory::with('category')->get();
        return view('admin.subcategory.index', compact('subcatregory'));
    }

    public function subCategoryDelete($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();

        $notification = array(
            'message' => 'Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function getCategory()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function subCategoryStore(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|string|max:255',
            'subcategory_name' => 'required|string|max:255',
        ]);

        // Create a new category instance
        $subcategory = new SubCategory();
        $subcategory->category_id = $validatedData['category_id'];
        $subcategory->name = $validatedData['subcategory_name'];
        $subcategory->icon = $request->subcategory_icon;
        $subcategory->save();

        $notification = array(
            'message' => 'created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function getSubCategoryData($id)
    {
        $category = Category::get();
        $subcategory = SubCategory::with('category')->findOrFail($id);
        return response()->json([
            'subcategory' => $subcategory,
            'category' => $category,
        ]);
    }

    public function SubcategoryUpdate(Request $request)
    {
        $subcategory_id = $request->input('subcategory_id');
        $subcategory = SubCategory::findOrFail($subcategory_id);

        $subcategory->category_id =  $request->input('category_id');
        $subcategory->name = $request->input('subcategory_name');
        $subcategory->icon = $request->input('subcategory_icon');

        $subcategory->save();

        $notification = array(
            'message' => 'updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    //  <--------------------------------------------------------- SubCtegory Part End ------------------------------------------------------------------->



    //  <--------------------------------------------------------- Home Slider  Start ------------------------------------------------------------------->

    public function viewHomeSlider()
    {
        $slider = Slider::get();
        return view('admin.home_slider.index', compact('slider'));
    }

    public function sliderStore(Request $request)
    {
        try {

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $imageName = time() . '.' . $request->image->extension();
            $resizedImage = Image::make($request->image)->fit(320, 370)->encode($request->image->extension());
            $resizedImage->save(public_path('images/slider/') . $imageName);

            $slider = new Slider();
            $slider->title = $request->title;
            $slider->status = 1;
            $slider->photo_name = $imageName;
            $slider->save();

            $notification = array(
                'message' => 'Added Successfully',
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

    public function updateStatus(Request $request)
    {

        $sliderID = $request->input('sliderID');
        $slider = Slider::findOrFail($sliderID);

        $slider->status = $request->input('status');
        $slider->save();

        $notification =  [
            'message' => "Update Successfully",
            'alerttype' => 'success'
        ];

        return response()->json($notification);
    }
    public function sliderDelete($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();

        $notification = array(
            'message' => 'Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    //  <--------------------------------------------------------- Home Slider  End ------------------------------------------------------------------->

}
