<?php

namespace App\Http\Controllers;

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

        $jobs = Task::select()->take(5)->orderby('id', 'desc')->get();
        $totalJobs = Task::all()->count();


        return view('home', compact('jobs', 'totalJobs'));
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
