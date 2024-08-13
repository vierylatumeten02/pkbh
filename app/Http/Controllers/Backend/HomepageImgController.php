<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomepageImg;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class HomepageImgController extends Controller
{
    public function AllHomepageImg() {
        $homepageimg = HomepageImg::findOrFail(1);
        return view('backend.homepageimg.update_homepageimg', compact('homepageimg'));
    }
    
    public function UpdateHomepageImg(Request $request){

        $homepageimg_id = $request->id;
        if ($request->file('top')) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('top')->getClientOriginalExtension();
            $img = $manager->read($request->file('top'));
            
            $img->save(public_path('/upload/homepageimg/'.$name_gen));
            $save_url = 'upload/homepageimg/'.$name_gen;

            HomepageImg::findOrFail($homepageimg_id)->update([
                'top' => $save_url,
            ]);
            
            $notification = array(
                'message' => 'Gambar Beranda Terupdate',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        
    }
}
