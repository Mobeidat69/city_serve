<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category\Category;
use App\Models\Tasks\Task;

class CategoriesController extends Controller
{
    public function singleCategory($id)
    {
        $name = Category::select('name')->where('id', $id)->first()->name;
        $jobs = Task::where('category_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('categories.single', compact('jobs', 'name'));
    }
    public function allCategories()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('categories.all', compact('categories',));
    }
}
