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
use App\Models\Tasks\Task;

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
            ->orderBy('created_at', 'desc')
            ->get();

        return view('users.applications', compact('applications'));
    }
    public function savedJobs()
    {
        $savedJobs = Task::with('savedTable')->whereHas('savedTable', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->get();

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
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'cv' => 'mimes:pdf,docx,doc',
        ]);

        $detils = User::find(Auth::user()->id);

        if ($request->cv) {
            if (File::exists(public_path('assets/cvs/' . $detils->cv))) {
                File::delete(public_path('assets/cvs/' . $detils->cv));
            }
            $destinationPath = 'assets/cvs/';
            $mycv = $request->file('cv');
            $filename =  Auth::user()->id . '_' . 'cv.' . $mycv->getClientOriginalExtension();
            $mycv->move(public_path($destinationPath), $filename);
            $detils->update(['cv' => asset('assets/cvs/' . $filename)]);
        }

        if ($request->image) {
            $destinationPath = 'assets/images_users/';
            $myimage = $request->file('image');
            $filename =  Auth::user()->id . '_' . 'image.' . $myimage->getClientOriginalExtension();
            $myimage->move(public_path($destinationPath), $filename);
            $detils->update([
                'image' => asset('assets/images_users/' . $filename)
            ]);
        }

        $detils->update([
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



        return redirect('/users/profile')->with('update', 'CV updated Successfully');
    }
}
