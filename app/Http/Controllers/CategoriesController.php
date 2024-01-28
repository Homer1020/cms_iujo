<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(5);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create', ['category' => new Category()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payload = $request->validate([
            'category'  => 'string|required',
            'slug'      => 'string|required'
        ]);

        Category::create([
            'category'  => $payload['category'],
            'slug'      => $payload['slug']
        ]);

        return response()->redirectToRoute('categories.index')->with('info', 'Se agrego la categoría correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $payload = $request->validate([
            'category'  => 'string|required',
            'slug'      => 'string|required'
        ]);

        $category->update([
            'category'  => $payload['category'],
            'slug'      => $payload['slug']
        ]);

        return response()->redirectToRoute('categories.index')->with('info', 'Se actualizo la categoría correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->redirectToRoute('categories.index')->with('info', 'Se elimino la categoría correctamente');
    }
}
