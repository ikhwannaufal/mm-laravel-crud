<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }
    
    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'nullable'    
        ]);
        // $newProduct = Product::create($data);

        // return redirect(route('product.index'));
        try {
            // Attempt to create a new product
            $newProduct = Product::create($data);

            // Log a success message
            Log::info('New product created successfully: ' . $newProduct->name);

            // Redirect to the index page
            return redirect(route('product.index'));
        } catch (\Exception $e) {
            // Log any errors that occur during data insertion
            Log::error('Error creating new product: ' . $e->getMessage());

            // Optionally, you can also return an error response or display an error message
            return back()->with('error', 'Failed to create new product. Please try again.');
        }
    }

    public function edit(Product $product) {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'nullable'    
        ]);

        $product->update($data);

        return redirect(route('product.index'))->with('success', 'Product Updated Successfully');
    }

    public function destroy(Product $product) {
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product Deleted Successfully');
    }
}
