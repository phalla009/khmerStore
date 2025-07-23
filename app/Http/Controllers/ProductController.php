<?php

namespace App\Http\Controllers;

use App\Models\Product;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all(); 
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'product_name' => 'required|min:2|max:100|unique:products,product_name',
            'price'        => 'required|numeric',
            'quantity'     => 'required|numeric',
            'warranty'     => 'numeric|max:200',
        ],[
            'product_name.min'=>'At Least 2 charaters'
        ]);
        Product::create($request->all());
        return redirect()->route('products.create')
        ->with('success', 'The product has been inseted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $product = Product::findOrFail($id);
        return view('products.show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $product = Product::findOrFail($id);

        $request->validate([
            'product_name' => [
                'required',
                'min:2',
                'max:100',
                Rule::unique('products', 'product_name')->ignore($product->id),
            ],
            'price'    => 'required|numeric',
            'quantity' => 'required|numeric',
            'warranty' => 'nullable|numeric|max:200',
        ]);

        $product->update($request->only([
            'product_name','description', 'price', 'quantity', 'warranty'
        ]));

        return redirect()->route('products.index')
                         ->with('success', 'The product has been updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'The product has been deleted successfully.');
    }


    public function confirmDeletion($id){

        return redirect()->route('products.index')->with('id',$id);

    }



}
