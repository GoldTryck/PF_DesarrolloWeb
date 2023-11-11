<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
{
    $category = new Category;
        $category->category = $request->input('category');
        $category->save();
    //return $request;
    return redirect()->route('categories.index')->with('status', 'Categoría agregada correctamente');
}

    public function destroy(Category $category){
        $category->delete();
        return to_route('categories.index')->with('status', 'Categoría Eliminada!');
    }
}
