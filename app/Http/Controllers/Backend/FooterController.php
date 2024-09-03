<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function FooterSetup() {

        $allfooter = Footer::find(1);
        return view('backend.footer.all_footer',compact('allfooter'));
    }

    public function UpdateFooter(Request $request){
        
        $footer_id = $request->id;
        Footer::findOrFail($footer_id)->update([
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,
            'address' => $request->address,
            'copyright' => $request->copyright,
        ]);

        $notification = array(
            'message' => 'Footer telah diupdate',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
