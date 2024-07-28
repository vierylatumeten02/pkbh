<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AllCategory(){
        $categories = Category::latest()->get();
        return view('backend.category.all_category',compact('categories'));
    }

    public function AddCategory(){
        $categories = Category::latest()->get();
        return view('backend.category.add_category',compact('categories'));
    }

    public function StoreCategory(Request $request){
        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('all.category')->with($notification);

    }

    public function EditCategory($id){
        $category = Category::findOrFail($id);
        return view('backend.category.edit_category', compact('category'));

    }

    public function UpdateCategory(Request $request){
        $cat_id = $request->id;
        Category::findOrFail($cat_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);

        $notification = array(
            'message' => 'Category Updated',
            'alert-type' => 'success'

        );

        return redirect()->route('all.category')->with($notification);
    }

    public function DeleteCategory($id){
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);
    }

    //All Subcategory
    public function AllSubcategory(){
        $subcategories = Subcategory::latest()->get();
        return view('backend.subcategory.all_subcategory',compact('subcategories'));
    }

    public function AddSubcategory(){
        $categories = Category::latest()->get();
        return view ('backend.subcategory.add_subcategory', compact('categories')
        );
    }

    public function StoreSubcategory(Request $request){
        Subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
        ]);

        $notification = array(
            'message' => 'Subcategory Created',
            'alert-type' => 'success'

        );

        return redirect()->route('all.subcategory')->with($notification);

    }

    public function EditSubcategory($id){
        $categories = Category::latest()->get();
        $subcategory = Subcategory::findOrFail($id);
        return view('backend.subcategory.edit_subcategory',compact('categories','subcategory'));
    }

    public function UpdateSubcategory(Request $request){

        $subcat_id = $request->id;

        Subcategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
        ]);

        $notification = array(
            'message' => 'Subcategory Updated',
            'alert-type' => 'success'

        );

        return redirect()->route('all.subcategory')->with($notification);

    }

    public function DeleteSubcategory($id){
        Subcategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Subcategory Deleted',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);
    }

    public function GetSubcategory($category_id){
        $subcat = Subcategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
        return json_encode($subcat);
    }

}
