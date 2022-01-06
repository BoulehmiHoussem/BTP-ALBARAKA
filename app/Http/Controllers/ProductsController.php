<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->title = "Produits";
        $this->description = "Gérez vos produits";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        if (isset($_GET['ajax']))
        {
            return view('ajax.productsAjax')
            ->with('products' , $products);
        }
        return view('stock.products.list')
        ->with('products' , $products)
        ->with('title' , $this->title)
        ->with('description' , $this->description);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stock.products.create')
        ->with('title' , $this->title)
        ->with('description' , $this->description);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        Product::create([
            "name"          => $request->input("name"),
            "reference"     => $request->input("reference"),
            "quantity"      => $request->input("quantity"),
            "price"         => $request->input("price"),
            "fournisseur"   => $request->input("fournisseur")
        ]);
        return redirect()->route('products.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $product = Product::find($request->id);
        if($product)
        {
            return view('ajax.productsSearchAjax')
            ->with('product' , $product)
            ->with('counter', $request->counter);
        }
        else
        {
            return false;
        }
        
    }
}
