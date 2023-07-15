<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.product.index', ['products'=>$products]);
    }

    public function create()
    {
        $categories = Category::all();
        // dd($categories);
        return view('backend.product.create', compact('categories'));

    }

    public function store(Request $request)
    {
        // dd($request->all());
        try
        {
            $ext = $request->file('image')->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            // dd($fileName);
            $request->file('image')->storeAs('public/products/'.$fileName);
        Product::create([
            'title'=>$request->title,
            'category_id'=>$request->category,
            'price'=>$request->price,
            'description'=>$request->description,
            'image'=>$fileName
        ]);
        return redirect()->route('products.list')->withMessage("Product Create Successfully!");
        } catch (QueryException $e) {
        log::error($e->getMessage());
        return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function show(Product $product)
    {
        return view('backend.product.show', ['product'=>$product]);
    }

    public function edit(Product $product)
    {
        // return view('backend.product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // try {
        //     $product->update([
        //         'title'=>$request->title,
        //         'price'=>$request->price,
        //         'description'=>$request->description,
        //         // 'image'=>$request->image,
        //     ]);
        //     return redirect()->route('products.list')->withMessage("Product Update Successfully!");
        // } catch (QueryException $e) {
        //     Log::error($e->getMessage());
        //     return redirect()->back()->withInput()->withErrors('Something Went Wrong Contact with Developer!');
        // }
    }

    public function destroy(Product $product)
    {
        // try {

        //     $product->delete();
        //     return redirect()->route('products.list')->withMessage("Product Delete Successfully!");
        // } catch (QueryException $e) {
        //     Log::error($e->getMessage());
        //     // dd($th->getMessage());
        //     return redirect()->back()->withInput()->withErrors('Something Went Wrong Contact with Developer!');
        // }
    }
}
