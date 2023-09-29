<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Organization;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cat = Category::with(['organization',])->get();
        return view('category.index',['cat' => $cat]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $org = Organization::all();
       return view('category.create',['org' => $org]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect("category")->with("success", "Successfully created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.show',['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $org = Organization::all();
        return view('category.edit',['category'=>$category,'org'=>$org]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->organization_id = $request->organization_id;
        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();
    
        return redirect()->route("category.index")->with("success", "Category updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (Category::destroy($category->id)) {
            return redirect("category")->with("success", "Successfully Deleted");
        }
    }
}
