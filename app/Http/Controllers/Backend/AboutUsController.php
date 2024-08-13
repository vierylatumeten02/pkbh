<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
class AboutUsController extends Controller
{
    public function AllAboutUs(){
        $aboutus = AboutUs::findOrFail(1);
        return view('backend.aboutus.update_about_us',compact('aboutus'));
    }

    public function UpdateAboutUs(Request $request) {
        $aboutus_id = $request->id;
        if ($request->file('team_photo')) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('team_photo')->getClientOriginalExtension();
            $img = $manager->read($request->file('team_photo'));
            
            $img->save(public_path('/upload/about_us_image/'.$name_gen));
            $save_url = '/upload/about_us_image/'.$name_gen;

            AboutUs::findOrFail($aboutus_id)->update([
                'team_photo' => $save_url,
                'team_description' => $request->team_description,
            ]);
            
            $notification = array(
                'message' => 'Tentang Tim Terupdate',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}
