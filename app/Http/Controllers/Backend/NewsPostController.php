<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Carbon\Carbon; 
use Intervention\Image\Drivers\Gd\Driver;

class NewsPostController extends Controller
{
    public function AllNewsPost(){
        
        $allnews = NewsPost::latest()->get();
        return view ('backend.news.all_news_post',compact('allnews'));
    }

    public function AddNewsPost(){
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $adminuser = User::where('role', 'admin')->latest()->get();
        return view('backend.news.add_news_post', compact('categories', 'subcategories', 'adminuser'));
    }

    public function StoreNewsPost(Request $request){
        
        if ($request->file('image')) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
            $img = $manager->read($request->file('image'));
            $img = $img->resize(784, 436);

            $img->save(public_path('/upload/news/'.$name_gen));
            $save_url = '/upload/news/'.$name_gen;

            NewsPost::insert([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'user_id' => $request->user_id,
                'news_title' => $request->news_title,
                'news_title_slug' => strtolower(str_replace(' ','-',$request->news_title)),
    
                'news_details' => $request->news_details,
                'tags' => $request->tags,
    
                'today_highlight' => $request->today_highlight,
                'top_slider' => $request->top_slider,
                'first_section_three' => $request->first_section_three,
                'first_section_nine' => $request->first_section_nine,
    
                'post_date' => date('d-m-Y'),
                'post_month' => date('F'),
                'image' => $save_url,
                'created_at' => Carbon::now(),  
    
            ]);
        }  // end if

         $notification = array(
            'message' => 'News Post Inserted Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.news.post')->with($notification);

    }

    public function EditNewsPost($id){
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $adminuser = User::where('role', 'admin')->latest()->get();
        $newspost = NewsPost::findOrFail($id);
        return view('backend.news.edit_news_post',compact('categories', 'subcategories', 'adminuser', 'newspost'));
    }

    public function UpdateNewsPost(Request $request){

        $newspost_id = $request->id;
        
        if ($request->file('image')) {

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
            $img = $manager->read($request->file('image'));
            $img = $img->resize(784, 436);

            $img->save(public_path('/upload/news/'.$name_gen));
            $save_url = '/upload/news/'.$name_gen;

            NewsPost::findOrFail($newspost_id)->update([

                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'user_id' => $request->user_id,
                'news_title' => $request->news_title,
                'news_title_slug' => strtolower(str_replace(' ','-',$request->news_title)),
    
                'news_details' => $request->news_details,
                'tags' => $request->tags,
    
                'today_highlight' => $request->today_highlight,
                'top_slider' => $request->top_slider,
                'first_section_three' => $request->first_section_three,
                'first_section_nine' => $request->first_section_nine,
    
                'post_date' => date('d-m-Y'),
                'post_month' => date('F'),
                'image' => $save_url,
                'updated_at' => Carbon::now(),  
    
            ]);
       
            $notification = array(
            'message' => 'News Posted',
            'alert-type' => 'success'
        );
        return redirect()->route('all.news.post')->with($notification);
            
        }else{
            NewsPost::findOrFail($newspost_id)->update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'user_id' => $request->user_id,
                'news_title' => $request->news_title,
                'news_title_slug' => strtolower(str_replace(' ','-',$request->news_title)),
    
                'news_details' => $request->news_details,
                'tags' => $request->tags,
    
                'today_highlight' => $request->today_highlight,
                'top_slider' => $request->top_slider,
                'first_section_three' => $request->first_section_three,
                'first_section_nine' => $request->first_section_nine,
    
                'post_date' => date('d-m-Y'),
                'post_month' => date('F'),
                'updated_at' => Carbon::now(),  
    
            ]);
       
            $notification = array(
            'message' => 'News Posted without Image Update',
            'alert-type' => 'success'
        );
        return redirect()->route('all.news.post')->with($notification);

        }   
    }

    public function DeleteNewsPost($id){
        
        $post_image = NewsPost::findOrFail($id);
        $img = $post_image->image;
        unlink($img);

        NewsPost::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'News Deleted',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);
    }

    public function InactiveNewsPost($id){
        NewsPost::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'News Inactived!',
            'alert-type' => 'info'

        );

        return redirect()->back()->with($notification);
    }

    public function ActiveNewsPost($id){
        NewsPost::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'News Actived!',
            'alert-type' => 'info'

        );

        return redirect()->back()->with($notification);
    }
}
