<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Carbon\Carbon; 
use Intervention\Image\Drivers\Gd\Driver;

class TeamMemberController extends Controller
{
    public function AllTeamMember() {
        $allteam = TeamMember::latest()->get();
        return view('backend.team_member.all_team_member', compact('allteam'));
    }

    public function AddTeamMember() {
        return view('backend.team_member.add_team_member');
    }

    public function StoreTeamMember(Request $request) {
        if ($request->file('photo')) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('photo')->getClientOriginalExtension();
            $img = $manager->read($request->file('photo'));
            $img = $img->resize(784, 784);

            $img->save(public_path('/upload/team_member_photo/'.$name_gen));
            $save_url = '/upload/team_member_photo/'.$name_gen;

            TeamMember::insert([
                'photo' => $save_url,
                'name' => $request->name,
                'department' => $request->department,
                'created_at' => Carbon::now(),  
            ]);
        }  // end if

         $notification = array(
            'message' => 'Anggota Tim telah ditambahkan',
            'alert-type' => 'success'

        );
        return redirect()->route('all.team.member')->with($notification);

    }

    public function EditTeamMember($id) {
        $allteam = TeamMember::findOrFail($id);
        return view('backend.team_member.edit_team_member',compact('allteam'));
    }

    public function UpdateTeamMember(Request $request){

        $allteam_id = $request->id;
        
        if ($request->file('photo')) {

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('photo')->getClientOriginalExtension();
            $img = $manager->read($request->file('photo'));
            $img = $img->resize(784, 784);

            $img->save(public_path('/upload/team_member_photo/'.$name_gen));
            $save_url = '/upload/team_member_photo/'.$name_gen;

            TeamMember::findOrFail($allteam_id)->update([

                'name' => $request->name,
                'department' => $request->department,
                
                'photo' => $save_url,
                'updated_at' => Carbon::now(),  
            ]);
       
            $notification = array(
            'message' => 'Data Anggota telah diperbarui',
            'alert-type' => 'success'
        );
        return redirect()->route('all.team.member')->with($notification);
            
        }else{
            TeamMember::findOrFail($allteam_id)->update([
                'name' => $request->name,
                'department' => $request->department,
                'updated_at' => Carbon::now(),  
            ]);
       
            $notification = array(
            'message' => 'Data Anggota telah diperbarui',
            'alert-type' => 'success'
        );
        return redirect()->route('all.team.member')->with($notification);

        }   
    }

    public function DeleteTeamMember($id){
        
        $post_image = TeamMember::findOrFail($id);
        $img = $post_image->photo;
        unlink($img);

        TeamMember::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'Anggota Telah dihapus',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);
    }

    public function InactiveTeamMember($id){
        TeamMember::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Data Anggota dinonaktifkan dari website',
            'alert-type' => 'info'

        );

        return redirect()->back()->with($notification);
    }

    public function ActiveTeamMember($id){
        TeamMember::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Data Anggota diaktifkan ke website',
            'alert-type' => 'info'

        );

        return redirect()->back()->with($notification);
    }
}
