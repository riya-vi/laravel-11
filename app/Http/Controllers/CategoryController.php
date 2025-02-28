<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $categories = Category::all() ;
        //   $categories = Category::all()->where('name', 'clothes') ;

       return view('products.category', compact('categories'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $category = Category::find(1) ;
        // $category->products()->attach([1,2,3]) ;
        // $categories = Category::with('products')->get() ;
        // return $categories ;

        return view('products.create-category') ;
   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Category::create([
            'name' => $request->input('name')
        ]) ;
        return redirect()->route('admin.products.category')->with('success', 'Category Created Successfully !');

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
    public function edit()
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse 
    {
        $category->delete() ;   

        return back()->with('success' , 'Category Deleted Successfuly !') ;
    }
}
