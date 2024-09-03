<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard(){
        $allnews = NewsPost::latest()->get();
        return view ('backend.news.all_news_post',compact('allnews'));
    }


    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Admin telah Keluar',
            'alert-type' => 'info'

        );

        return redirect('/admin/logout/page')->with($notification);
    }

    public function AdminLogin(){
        return view('admin.admin_login');
    }

    public function AdminLogoutPage(){
        return view('admin.admin_logout');
    }

    public function AdminProfile(){

        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view ('admin.admin_profile_view', compact('adminData'));
    }

    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Profil Admin Terupdate',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);
    }

    public function AdminChangePassword(){
        return view ('admin.admin_change_password');
    }

    public function AdminUpdatePassword(Request $request){
        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);    
        
        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with('error', "Password Lama Berbeda!");
        }

        // Update New Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('status', 'Password telah diganti');
    }

    public function AllAdmin(){
        $alladminuser = User::where('role','admin')->latest()->get();
        return view ('backend.admin.all_admin',compact('alladminuser'));
    }

    public function AddAdmin(){
        return view ('backend.admin.add_admin');
    }

    public function StoreAdmin(Request $request){
        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'inactive';
        $user->save();

        $notification = array(
            'message' => 'Berhasil Membuat Akun Admin Baru',
            'alert-type' => 'success'

        );
        return redirect()->route('all.admin')->with($notification);
    }

    public function EditAdmin($id){
        $adminuser = User::findOrFail($id);
        return view('backend.admin.edit_admin',compact('adminuser'));
    }

    public function UpdateAdmin(Request $request){

        $admin_id = $request->id;

        $user = User::findOrFail($admin_id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'admin';
        $user->status = 'inactive';
        $user->save();

        $notification = array(
            'message' => 'Akun Admin Terupdate',
            'alert-type' => 'success'

        );
        return redirect()->route('all.admin')->with($notification);
    }

    public function DeleteAdmin($id){
        User::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Admin Telah Dihapus',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);
    }

    public function InactiveAdminUser($id){
        User::findOrFail($id)->update(['status' => 'inactive']);
        $notification = array(
            'message' => 'Admin Tidak Aktif!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ActiveAdminUser($id){
        User::findOrFail($id)->update(['status' => 'active']);
        $notification = array(
            'message' => 'Admin Aktif!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}   
