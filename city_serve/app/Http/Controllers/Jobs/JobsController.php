<?php

namespace App\Http\Controllers\Jobs;

use App\Models\Job\Tasks;
use App\Models\Tasks\Task;
use App\Models\Job\JobSaved;
use Illuminate\Http\Request;
use App\Models\Job\Application;
use App\Models\Category\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    public function single($id)
    {
        $job = Task::with('category:id,name')->findOrFail($id);
        $relatedJobs = Task::where('category_id', $job->category_id)
            ->where('id', '!=', $id)
            ->take(5)
            ->get();

        $relatedJobsCount = $relatedJobs->count();
        $savedJob = null;
        $appliedJob = null;

        if (auth()->check()) {
            $user_id = auth()->user()->id;

            $savedJob = JobSaved::where('task_id', $id)
                ->where('user_id', $user_id)
                ->count();
            $appliedJob = Application::where('user_id', $user_id)
                ->where('task_id', $id)
                ->count();
        }
        $categories = Category::all()->take(5);

        return view('jobs.single', compact('job', 'relatedJobs', 'relatedJobsCount', 'savedJob', 'appliedJob', 'categories'));
    }

    public function saveJob(Request $request)
    {

        $saveJob = JobSaved::create([
            'task_id' => $request->task_id,
            'user_id' => $request->user_id,
        ]);
        if ($saveJob) {
            return redirect('/jobs/single/' . $request->task_id . '')->with('save', 'Oppertuinity saved!');
        }
    }


    public function jobApply(Request $request)
    {
        if ($request->cv == 'No cv' || $request->cv == null) {
            return redirect('/jobs/single/' . $request->task_id)->with('apply', 'upload your cv in your profile first!');
        } else {
            $jd = $request->task_id;
            $applyJob = Application::create([
                'cv' => Auth::user()->cv,
                'task_id' => $jd,
                'user_id' => Auth::user()->id,
            ]);
            if ($applyJob) {
                return redirect('/jobs/single/' . $request->task_id . '')->with('applied', 'you have applied to this Oppertuinity!');
            }
        }
    }


  public function search(Request $request)
{
    $title = $request->input('title');
    $location = $request->input('location');
    $category = $request->input('category');

    $searches = Task::select('tasks.*', 'categories.name as category_name')
        ->join('categories', 'tasks.category_id', '=', 'categories.id')
        ->where(function ($query) use ($title, $location, $category) {
            if ($title) {
                $query->where('tasks.title', 'like', '%' . strtolower(trim($title)) . '%');
            }
            if ($location) {
                $query->where('tasks.location', 'like', '%' . strtolower(trim($location)) . '%');
            }
            if ($category) {
                $query->where('categories.name', 'like', '%' . strtolower(trim($category)) . '%');
            }
        })
        ->orderBy('tasks.created_at', 'desc')
        ->get();

    return view('jobs.search', compact('searches'));
}

    
}
