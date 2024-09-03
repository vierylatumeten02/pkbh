<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function StoreMessage(Request $request) {
        Contact::insert([
            'email' => $request->email,
            'phone' => $request->phone,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'message' => $request->message,

            'contacts_date' => date('d M Y, H:i'),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Pesan Anda telah Terkirim',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);
    }

    public function ContactMessage() {

        $contacts = Contact::where('status',0)->orderBy('id','DESC')->get();
        return view ('backend.contact.all_contact',compact('contacts'));
    }

    public function DeleteMessage($id) {
        Contact::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Kontak telah dihapus',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);
    }

    public function ContactReview($id){
        Contact::where('id', $id)->update(['status' => 1]);
        
        $notification = array(
            'message' => 'Kontak telah dihubungi',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);
    }

    public function ContactReach(){
        $review = Contact::where('status',1)->orderBy('id','DESC')->get();
        return view ('backend.contact.reach_contact',compact('review'));

        $notification = array(
            'message' => 'Kontak telah dihubungi',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);
    }

    public function ContactDetail($id) {
        $detailcontact = Contact::findOrFail($id);
        return view ('backend.contact.detail_contacts',compact('detailcontact'));
    }
}
