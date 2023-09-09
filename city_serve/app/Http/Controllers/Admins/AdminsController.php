<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
use App\Models\Admins\Admin;
use App\Models\Category\Category;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
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

    public function index()
    {
        $admins = Admin::select()->count();
        return view("admins.index", compact('admins'));
    }
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
        ]);
        $createdCategory = Category::create([
            'name' => $request->name,
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
            'name' => 'required|max:40|unique:categories',
        ]);
        $category = Category::find($request->id);
        $category->update($request->all());

        return redirect()->route('view.cetegories')->with('create', 'A category has been created');
    }
    public function deleteCategory(Request $request)
    {
        $category = Category::find($request->id);
        $category->delete();
        return redirect()->route('view.cetegories')->with('create' ,'A category has been deleted');
    }
}
