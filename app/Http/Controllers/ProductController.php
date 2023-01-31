<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;


        //vienas id/ daug id $catgegories_id = [1,2,3,4,5]
        // $request->category_id 
        // as tureciau i rysio lentele irasyti ta id
        // detach() - nuimti | bendravimui su rysio lentele, istrina irasa is rysio lenteles
        // attach() - prideti | bendravimui su rysio lentele, iraso i rysio lentele
        
        //categories_products lentele
        // produktai belongsToMany kategorijos
        // ????? galbut pasinaudant rysio funkcija Product modelyje ir panaudojus attach funkcija
        //pagal egzistuojancius rysius mums atpazins rysio lentele - melas


        // lenteles atpazinimas vyksta pagal modeliu vardus
        //category - Category
        //product - Product
        // category_product
        $product->save();
        //find(2) = man ras kategorija su id 2 objekta
        //find([2,3,4,5]) = man ras kategorijas su id 1,2,3 objektu masyva
        $categories = Category::find($request->category_id);

        //attach($category) = man i duomenu bazes rysio lentele irasys 1 irasa
        //attach($category_array) = man i duomenu bazes rysio lentele irasys n +1 irasu
        $product->productCategories()->attach($categories);



        //pirma isaugosiu produkta, o tada prie jo prikabinsiu kategorija 1(ir daugiau)
        

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        $product->save();
        //find(2) = man ras kategorija su id 2 objekta
        //find([2,3,4,5]) = man ras kategorijas su id 1,2,3 objektu masyva
        
        
        
        $categories = Category::find($request->category_id);

        //attach($category) = man i duomenu bazes rysio lentele irasys 1 irasa
        //attach($category_array) = man i duomenu bazes rysio lentele irasys n +1 irasu
        
        $product->productCategories()->sync($categories);
        

        // $product->productCategories()->detach();
        // $product->productCategories()->attach($categories);



        //pirma isaugosiu produkta, o tada prie jo prikabinsiu kategorija 1(ir daugiau)
        

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //

        //   $product->productCategories()->detach(); // ar butinai kartais ne, taip mum reikia isvalyti
         $product->delete();

         return redirect()->route('products.index');
    }
}
