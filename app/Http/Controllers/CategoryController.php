<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('userCreator')->paginate(10);
        // dd($categories);
        return Inertia('Categories/Index',[
            'categories'=>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     * @param App\Http\Requests\CategoryRequest
     * @return Inertia\Response
     */
    public function store(CategoryRequest $request)
    {
        $auth = Auth::id();
        $values = array_merge($request->validated(), ['user_creator_id' => $auth]);
        
        // dd($values);
        Category::create($values);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return inertia('Categories/Edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     * @param App\Http\Requests\CategoryRequest
     * @param Category $category
     * @return Inertia\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Category $category
     * @return Inertia\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
