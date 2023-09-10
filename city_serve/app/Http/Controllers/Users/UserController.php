<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job\Application;
use App\Models\Job\JobSaved;
use File;
use Auth;

class UserController extends Controller
{
    public function profile()
    {

        $profile = User::find(Auth::user()->id);

        return view('users.profile', compact('profile'));

    }
    public function applications()
    {

        $applications = Application::where('user_id', Auth::user()->id)
            ->get();

        return view('users.applications', compact('applications'));

    }
    public function savedJobs()
    {

        $savedJobs = Jobsaved::where('user_id', Auth::user()->id)
            ->get();

        return view('users.savedjobs', compact('savedJobs'));

    }
    public function editDetails()
    {

        $userDetails = User::find(Auth::user()->id);

        return view('users.editdetails', compact('userDetails'));

    }
    public function updateDetails(Request $request)
    {
        Request()->validate([
            'name' => 'required|max:40',
            'job_title' => 'required|max:40',
            'bio' => 'required',
            'github' => 'required|max:140',
            'linkedin' => 'required|max:140',
        ]);

        $userDetailsUpdate = User::find(Auth::user()->id);
        $userDetailsUpdate->update([
            "name" => $request->name,
            "job_title" => $request->job_title,
            "bio" => $request->bio,
            "github" => $request->github,
            "linkedin" => $request->linkedin,


        ]);
        if ($userDetailsUpdate) {
            return redirect('/users/edit-details/')->with('update', 'User details updated successfully!');
        }



    }
    public function editCV(){
        return view('users.editcv');
    }
    public function updateCV(Request $request)
    {

        $oldCV = User::find(Auth::user()->id);
        
        if(File::exists(public_path('assets/cvs/'.$oldCV->cv))){
            File::delete(public_path('assets/cvs/'.$oldCV->cv));
        }else{

        }
        $destinationPath = 'assets/cvs/';
        $mycv = $request->file('cv');
        $filename =  User::max('id') +1 . '_' . 'cv.' . $mycv->getClientOriginalExtension();
        $mycv->move(public_path($destinationPath), $filename);

        $oldCV->update([
            'cv' => asset('assets/cvs/' . $filename),
        ]);
        return redirect('/users/profile')->with('update', 'CV updated Successfully');
    }
    public function editImage(){
        return view('users.editimage');
    }
    public function updateimage(Request $request)
    {

        $oldimage = User::find(Auth::user()->id);
        
        if(File::exists(public_path('assets/images_users/'.$oldimage->image))){
            File::delete(public_path('assets/images_users/'.$oldimage->image));
        }else{

        }
        $destinationPath = 'assets/images_users/';
        $myimage = $request->file('image');
        $filename =  User::max('id') +1 . '_' . 'image.' . $myimage->getClientOriginalExtension();
        $myimage->move(public_path($destinationPath), $filename);

        $oldimage->update([
            'image' => asset('assets/images_users/' . $filename),
        ]);
        return redirect('/users/profile')->with('update', 'image updated Successfully');
    }
}