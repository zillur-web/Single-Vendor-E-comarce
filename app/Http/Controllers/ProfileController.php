<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\AdminProfile;
use App\Models\AdminSkils;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Image;

class ProfileController extends Controller
{
    public function __construct(){
        // is admin or not
        $this->middleware('isadmin');
    }
    public function UserProfile($id){
        return view('backend.role.profile',[
            'user' => User::findOrFail($id),
            'permissions' => Permission::all(),
        ]);
    }
    public function UserProfileImageUpdate(Request $request){
        $user = $request->user_id;
        $check = AdminProfile::where('admin_id', $user)->first();

        if($check == false){
            $profile = new AdminProfile;
            $profile->admin_id = $user;
        }
        else{
            $profile = $check;
        }

        $request->validate([
            'user_id' => ['required'],
            'file' => ['required','mimes:jpg,jpeg,png'],
        ]);
        if($request->hasFile('file')){
            $image = $request->file('file');
            $image_new_name = Str::random(5).'-profile-image-user-id-'.$user.'.'.$image->getclientoriginalextension();

            if($profile->img != null){
                $old_img = public_path('image/admin-profile/'.$profile->img);
                if(file_exists($old_img)){
                    unlink($old_img);
                }
            }

            Image::make($image)->save(public_path('image/admin-profile/'.$image_new_name));

            $profile->img = $image_new_name;
            $profile->save();
        }
        return redirect()->route('user.profile', $user)->with('success','Profile Picture Upload Successfull!');
    }


    public function UserProfileNameUpdate(Request $request) {
        $user = User::findOrFail($request->user);
        $user->name = $request->name;
        $user->save();

        return redirect()->route('user.profile', $request->user)->with('success', 'Name Change Successfull.');
    }

    public function UserProfileDiscUpdate(Request $request) {
        $check = AdminProfile::where('admin_id', $request->user)->first();

        if($check == false){
            $profile = new AdminProfile;
            $profile->admin_id = $request->user;
        }
        else{
            $profile = $check;
        }

        $profile->disc = $request->disc;
        $profile->save();

        return redirect()->route('user.profile', $request->user)->with('success', 'Description Change Successfull.');
    }
    public function UserProfileSkilsUpdate(Request $request) {
        $check = AdminProfile::where('admin_id', $request->user)->first();

        if($check == false){
            $profile = new AdminProfile;
            $profile->admin_id = $request->user;
        }
        else{
            $profile = $check;
        }

        $profile->skils = $request->skils;
        $profile->save();
        return redirect()->route('user.profile', $request->user)->with('success', 'Skils Change Successfull.');
    }
    public function UserProfileAddressUpdate(Request $request) {
        $check = AdminProfile::where('admin_id', $request->user)->first();

        if($check == false){
            $profile = new AdminProfile;
            $profile->admin_id = $request->user;
        }
        else{
            $profile = $check;
        }

        $profile->address = $request->address;
        $profile->save();
        return redirect()->route('user.profile', $request->user)->with('success', 'Address Change Successfull.');
    }
    public function UserProfileEducationAdd(Request $request) {
        $request->validate([
            'title' => ['required'],
            'institute' => ['required'],
            'country' => ['required'],
            'year' => ['required'],
        ]);

        $skils = new AdminSkils;
        $skils->admin_id = $request->user;
        $skils->title = $request->title;
        $skils->institute = $request->institute;
        $skils->country = $request->country;
        $skils->year = $request->year;
        $skils->save();

        return redirect()->route('user.profile', $request->user)->with('success', 'Skil Added Successfull.');
    }

    public function UserProfileEducationDelete($id, $user) {
        $skils = AdminSkils::findOrFail($id);
        $skils->forceDelete();
        return redirect()->route('user.profile', $user)->with('success', 'Skil Added Successfull.');
    }
}
