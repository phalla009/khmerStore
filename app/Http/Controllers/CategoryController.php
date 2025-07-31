<?php

namespace App\Http\Controllers;

use App\Models\Category;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all(); 
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'category_name' => 'required|min:2|max:60|unique:categories,category_name'
        ]);
        Category::create($request->all());
        return redirect()->route('categories.create')
        ->with('success', 'The Category has been inseted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $category = Category::findOrFail($id);

          $request->validate([
            'category_name' => 'required|min:2|max:60|unique:categories,category_name',
            'description' => 'nullable|max:255'
        ]);
        $category->update($request->only([
            'category_name','description'
        ]));

        return redirect()->route('Categorys.index')
                         ->with('success', 'The Category has been updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route(route: 'categories.index')->with('success', 'The Category has been deleted successfully.');
    }


    public function confirmDeletion($id){

        return redirect()->route('categories.index')->with('id',$id);

    }



}
