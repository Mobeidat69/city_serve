<?php

namespace App\Http\Controllers\Users;

use File;
use App\Models\User;
use App\Models\Job\JobSaved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Applications\Application;

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
            ->with('task', 'user', 'task.category')
            ->get();

        return view('users.applications', compact('applications'));
    }
    public function savedJobs()
    {

        $savedJobs = DB::table('jobsaved')
            ->join('tasks', 'jobsaved.task_id', '=', 'tasks.id')
            ->join('users', 'jobsaved.user_id', '=', 'users.id')
            ->select(
                'jobsaved.*',
                'tasks.*', 
                'users.*'  
            )
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
            'bio' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $detils = User::find(Auth::user()->id);

        $destinationPath = 'assets/images_users/';
        $myimage = $request->file('image');
        $filename =  User::max('id') + 1 . '_' . 'image.' . $myimage->getClientOriginalExtension();
        $myimage->move(public_path($destinationPath), $filename);

        $detils->update([
            'image' => asset('assets/images_users/' . $filename),
            "name" => $request->name,
            "bio" => $request->bio,
        ]);
        if ($detils) {
            return redirect('/users/edit-details/')->with('update', 'User details updated successfully!');
        }
    }
    public function editCV()
    {
        return view('users.editcv');
    }
    public function updateCV(Request $request)
    {
        $oldCV = User::find(Auth::user()->id);

        if (File::exists(public_path('assets/cvs/' . $oldCV->cv))) {
            File::delete(public_path('assets/cvs/' . $oldCV->cv));
        } else {
        }
        $destinationPath = 'assets/cvs/';
        $mycv = $request->file('cv');
        $filename =  User::max('id') + 1 . '_' . 'cv.' . $mycv->getClientOriginalExtension();
        $mycv->move(public_path($destinationPath), $filename);

        $oldCV->update([
            'cv' => asset('assets/cvs/' . $filename),
        ]);
        return redirect('/users/profile')->with('update', 'CV updated Successfully');
    }
}
