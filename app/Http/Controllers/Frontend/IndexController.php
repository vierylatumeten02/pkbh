<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Subcategory;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function Index(){
        return view ('frontend.index');
    }

    public function NewsDetails($id,$slug){
        $news = NewsPost::findOrFail($id);

        $tags = $news->tags;
        $tags_all = explode(',', $tags);

        $cat_id = $news->category_id;
        $relatedNews = NewsPost::where('category_id', $cat_id)->where('id','!=',$id)->orderBy('id', 'DESC')->limit(6);

        $newsKey = 'blog' . $news->id;
        if (!Session::has($newsKey)) {
            $news->increment('view_count');
            Session::put($newsKey,1);
        }  

        $newPost = NewsPost::orderBy('id','DESC')->limit(9)->get();
        $popularPost = NewsPost::orderBy('view_count', 'DESC')->limit(5)->get();

        return view('frontend.news.news_details',compact('news', 'tags_all', 'relatedNews', 'newPost', 'popularPost'));
    }

    public function CatWiseNews($id,$slug){
        $news = NewsPost::where('status',1)->where('category_id',$id)->orderBy('id', 'DESC')->get();
        $breadcat = Category::where('id',$id)->first();
        $newstwo = NewsPost::where('status',1)->where('category_id',$id)->orderBy('id', 'DESC')->limit(2)->get();

        $newPost = NewsPost::orderBy('id','DESC')->limit(5)->get();
        $popularPost = NewsPost::orderBy('view_count', 'DESC')->limit(5)->get();


        return view ('frontend.news.category_news',compact('news', 'breadcat', 'newstwo', 'newPost', 'popularPost'));
    }
    
    public function SubCatWiseNews($id,$slug){
        $news = NewsPost::where('status',1)->where('subcategory_id',$id)->orderBy('id', 'DESC')->get();
        $breadsubcat = Subcategory::where('id',$id)->first();
        $newstwo = NewsPost::where('status',1)->where('subcategory_id',$id)->orderBy('id', 'DESC')->limit(2)->get();

        $newPost = NewsPost::orderBy('id','DESC')->limit(5)->get();
        $popularPost = NewsPost::orderBy('view_count', 'DESC')->limit(5)->get();


        return view ('frontend.news.subcategory_news',compact('news', 'breadsubcat', 'newstwo', 'newPost', 'popularPost'));
    }

    public function SearchByDate(Request $request){
        $date = new DateTime($request->date);
        $formatDate = $date->format('d-m-Y');

        $newnewspost = NewsPost::orderBy('id','DESC')->limit(9)->get();
        $newspopular = NewsPost::orderBy('view_count','DESC')->limit(8)->get();

        $news = NewsPost::where('post_date',$formatDate)->latest()->get();
        return view('frontend.news.search_by_date',compact('news','formatDate'));
        return view('frontend.news.search_by_date',compact('news','formatDate','newnewspost','newspopular'));

    }// End Method

    public function NewsSearch(Request $request) {
        $request->validate(['search' => "required"]);

        $item = $request->search;

        $news = NewsPost::where('news_title','LIKE',"%$item%")->get();
        $newnewspost = NewsPost::orderBy('id','DESC')->limit(8)->get();
        $newspopular = NewsPost::orderBy('view_count','DESC')->limit(8)->get();

        return view('frontend.news.search',compact('news','newnewspost','newspopular','item'));
    }
    

    public function AllNewsShow() {
        $showallNews = NewsPost::latest()->get();
        return view ('frontend.news.show_all_news',compact('showallNews'));
        
    }

    public function PKBHTeam() {
        return view ('frontend.team.pkbh_team');
    }

    public function ClientList() {
        return view ('frontend.client.client_list');
    }
}
    


