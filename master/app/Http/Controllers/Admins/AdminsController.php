<?php

namespace App\Http\Controllers\Admins;

use App\Models\User;
use App\Models\Tasks\Task;
use App\Models\Admins\Admin;
use Illuminate\Http\Request;
use App\Models\Category\Category;
use App\Models\Applications\Application;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AdminsController extends Controller
{
    public function index()
{
    $opportunitiesCount = Task::count();
    $categoriesCount = Category::count();
    $adminsCount = Admin::count();
    $applicationsCount = Application::count();

    return view("admins.index", compact('opportunitiesCount', 'categoriesCount', 'adminsCount', 'applicationsCount'));
}

    public function viewLogin()
    {
        return view("admins.view-login");
    }

    public function checkLogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            return redirect()->route('admins.dashboard');
        }

        return redirect()->back()->with(['error' => 'Error logging in']);
    }

    // public function index()
    // {
    //     $admins = Admin::select()->count();

    //     return view("admins.index", compact('admins'));
    // }
    public function admins()
    {
        $admins = Admin::all();
        return view("admins.all-admins", compact('admins'));
    }
    public function createAdmins()
    {
        return view("admins.create-admins");
    }
    public function storeAdmin(Request $request)
    {
        Request()->validate([
            'name' => 'required|max:40',
            'email' => 'required|max:255|unique:Admins',
            'password' => 'required|max:32',
        ]);
        $createdAdmin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($createdAdmin) {
            return redirect()->route('view.admins')->with('create', 'Admin account has been created');
        }
    }
    public function users()
    {
        $users = User::all();
        return view("admins.all-users", compact('users'));
    }
    public function createUsers()
    {
        return view("admins.create-users");
    }
    public function storeUser(Request $request)
    {
        Request()->validate([
            'name' => 'required|max:40',
            'email' => 'required|max:255|unique:Admins',
            'password' => 'required|max:32',
        ]);
        $createdUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($createdUser) {
            return redirect()->route('view.users')->with('create', 'User account has been created');
        }
    }
    public function viewEditUser($id)
    {
        $user = User::find($id);
        return view("admins.edit-User", compact('user'));
    }
    public function updateUser(Request $request)
    {
        Request()->validate([
            'name' => 'required|max:40',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:32',
        ]);
        $User = User::find($request->id);
        $User->update($request->all());

        return redirect()->route('view.users')->with('create', 'A user has been created');
    }
    public function deleteUser(Request $request)
    {
        $User = User::find($request->id);
        $User->delete();
        return redirect()->route('view.users')->with('create', 'A user has been deleted');
    }

    public function viewCetegories()
    {
        $categories = Category::all();
        return view("admins.categories", compact('categories'));
    }
    public function createCategory()
    {
        return view("admins.create-category");
    }
    public function storeCategory(Request $request)
    {
        Request()->validate([
            'name' => 'required|max:40|unique:categories',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $image = $request->file('image');
        $filename =  Category::max('id') . '_' . 'picture.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/images'), $filename);

        $createdCategory = Category::create([
            'name' => $request->name,
            'image' => asset('assets/images/' . $filename),
        ]);

        if ($createdCategory) {
            return redirect()->route('view.cetegories')->with('create', 'A category  has been created');
        }
    }
    public function viewEditCategory($id)
    {
        $category = Category::find($id);
        return view("admins.edit-category", compact('category'));
    }
    public function updateCategory(Request $request)
    {
        Request()->validate([
            'name' => 'required|max:40',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $image = $request->file('image');
        $filename =  $request->id . '_' . 'picture.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/images'), $filename);

        $category = Category::find($request->id);

        $category->update([
            'name' => $request->name,
            'image' => asset('assets/images/' . $filename),
        ]);

        return redirect()->route('view.cetegories')->with('create', 'A category has been created');
    }
    public function logout()
{
    Auth::guard('admin')->logout();
    return redirect()->route('admins.viewLogin');
}
    public function deleteCategory(Request $request)
    {
        $category = Category::find($request->id);
        $category->delete();
        return redirect()->route('view.cetegories')->with('create', 'A category has been deleted');
    }
    public function viewTasks()
    {
        $Tasks = Task::all();
        return view("admins.tasks", compact('Tasks'));
    }
    public function viewTask($id)
    {
        $task = Task::find($id);
        return view("admins.task", compact('task'));
    }
    public function createTasks()
    {
        $categories = Category::select('id', 'name')->get();
        return view("admins.create-task", compact('categories'));
    }
    public function storeTasks(Request $request)
    {
        Request()->validate([
            'title' => 'required|max:40',
            'description' => 'required',
            'location' => 'required|max:255',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|after:start_date',
            'deadline' => 'required|before:start_date',
            'vacancy' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $image = $request->file('image');
        $filename = 'Task no.' . Task::max('id') . '_' . 'picture.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/images'), $filename);

        $createdTask = new Task([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'deadline' => $request->deadline,
            'vacancy' => $request->vacancy,
            'skills_required' => $request->skills_required,
            'image' => asset('assets/images/' . $filename),
        ]);
        $categoryId = $request->input('category');
        $createdTask->category()->associate($request->category);

        $createdTask->save();


        if ($createdTask) {
            return redirect()->route('view.tasks')->with('create', 'A Tasks has been created');
        }
    }
    public function viewEditTasks($id)
    {
        $task = Task::find($id);
        $categories = Category::all();
        return view("admins.edit-task", compact('task', 'categories'));
    }
    public function updateTasks(Request $request)
    {

        Request()->validate([
            'title' => 'required|max:40',
            'description' => 'required',
            'location' => 'required|max:255',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|after:start_date',
            'deadline' => 'required|before:start_date',
            'vacancy' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $image = $request->file('image');
        $filename = 'Task_no.' . $request->id . '_' . 'picture.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/images'), $filename);

        $createdTask = Task::find($request->id);
        $createdTask->update([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'deadline' => $request->deadline,
            'vacancy' => $request->vacancy,
            'skills_required' => $request->skills_required,
            'image' => asset('assets/images/' . $filename),
        ]);
        $createdTask->save();


        if ($createdTask) {
            return redirect()->route('view.tasks')->with('create', 'A Tasks has been updated');
        }
    }
    public function deleteTasks(Request $request)
    {
        $Tasks = Task::find($request->id);
        $Tasks->delete();
        return redirect()->route('view.tasks')->with('create', 'A Tasks has been deleted');
    }

    public function viewApplications()
    {
        $applications = Application::join('tasks', 'applications.task_id', '=', 'tasks.id')
            ->join('users', 'applications.user_id', '=', 'users.id')
            ->select(
                'applications.id as application_id',
                'applications.status as status',
                'tasks.image as task_image',
                'tasks.title as task_title',
                'tasks.id as task_id',
                'users.id as user_id',
                'tasks.vacancy',
                'applications.cv'
            )
            ->get();
        return view("admins.applications", compact('applications'));
    }
}
