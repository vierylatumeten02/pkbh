<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Infographic;
use Carbon\Carbon; 
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class InfographicController extends Controller
{
    public function AllInfographics() {
        $infographic = Infographic::findOrFail(1);
        return view('backend.infographic.update_infographic', compact('infographic'));
    }

    public function UpdateInfographics(Request $request){

        $infographic_id = $request->id;
        if ($request->file('infographic_image')) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('infographic_image')->getClientOriginalExtension();
            $img = $manager->read($request->file('infographic_image'));
            
            $img->save(public_path('/upload/infographic/'.$name_gen));
            $save_url = 'upload/infographic/'.$name_gen;

            Infographic::findOrFail($infographic_id)->update([
                'infographic_image' => $save_url,
            ]);
            
            $notification = array(
                'message' => 'Infografis Terupdate',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        
    }
}
