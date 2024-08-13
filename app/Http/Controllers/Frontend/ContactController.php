<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
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
        ]);

        $notification = array(
            'message' => 'Pesan Anda telah Terkirim',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);
    }

    public function ContactMessage() {

        $contacts = Contact::latest()->get();
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
}
