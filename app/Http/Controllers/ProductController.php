<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
 
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::paginate(5); //using charperone
        $products = Product::with('user')->paginate(5);  //user charperone() instead 
        // $products = Product::with('user')->get();
        $categories = Category::get() ;  

        // $products = DB::table('products')->paginate(5);
        // dd($products) ;
        return view('products.index', compact('products','categories'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $userId = Auth::id();
        $input = $request->validated();
        if ($image = $request->file('image')) {
            $imagePath = $image->store('productImages', 'public');

            $input['image'] = Storage::url($imagePath);
        }
        else{
            $input['image'] = Storage::url('default/product-default.png');
        }
        $input['user_id'] = $userId;
        Product::create($input);

        // return redirect()->route('products.index')->with('success', 'New Product is added Successfully!');

        return response()->json([
            'message' => 'New Product is added Successfully!',
            'redirect' => route('products.index'),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show-product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $input = $request->validated();

        if ($image = $request->file('image')) {
            if ($product->image && Storage::exists('public/' . $product->image)) {
                Storage::delete('public/' . $product->image);
            }
            $imagePath = $image->store('productImages', 'public');
            $input['image'] = Storage::url($imagePath);
        }
        $product->update($input);

        return response()->json(['success' => 'Product is updated successfully.'], 200);
    } 

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        // return redirect()->route('products.index')->with('success', 'Product deleted successfully !');
        return back()->with('success', 'Product deleted successfully !');
    }

    public function showOwnProducts()
    {
        // $products = Product::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(3);

        $products = Product::where('user_id', Auth::id())->orderBy('created_at', 'desc')->toArray();

        

        return view('user.product-list')->with('products',$products);
    }
}
