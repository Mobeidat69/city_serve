<?php

namespace App\Http\Controllers;

use App\Models\Applications\Application;
use App\Models\Category\Category;
use Illuminate\Http\Request;
use App\Models\Tasks\Task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs = Task::select('tasks.*')
            ->join('categories', 'tasks.category_id', '=', 'categories.id')
            ->orderBy('tasks.created_at', 'desc')  // Order by the creation date (most recent first)
            ->take(5)                               // Limit to 5 results
            ->get();
        $categories = Category::pluck('name');
        $candidates = Application::where('status', 1)->count();
        $appFilled = Application::get()->count();
        $tasks = Task::get()->count();
        return view('home', compact('appFilled', 'jobs', 'categories', 'candidates', 'tasks'));
    }

    public function about()
    {
        return view('pages.about');
    }


    public function contact()
    {
        return view('pages.contact');
    }
}
