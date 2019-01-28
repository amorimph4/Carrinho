<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategorys;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pages = ProductCategorys::all();
        return view( 'admin.pages.product.product', compact('pages') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            if ($request->hasFile('image')) {
                $request->file('image');
                $data['image'] = $request->file('image')->getClientOriginalName();
                $request->image->storeAs('images', $request->file('image')->getClientOriginalName(), 'images');
            }
            $product = Product::create($data);
            ProductCategorys::create([
                'product_id' => $product->id,
                'category_id' => $data['category'],
            ]);

            $request->session()->flash('success', 'criado com sucesso');
            return response()->redirectToRoute('products');
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops algo deu errado'); 
            return response()->redirectToRoute('products');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Product $product)
    {
        try {
            $product = new ProductResource($product);
            if (array_key_exists('products', $request->session()->all() )) {
                $productSession = $request->session()->all()['products'];
                if (array_key_exists($product->name , $productSession)) {
                    $product->qtd = $product->qtd - $productSession[$product->name]['qtd'];
                }
            }
            return $product;
        }catch (Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try{
            $data = $request->all();
            $productCategory = ProductCategorys::where('product_id', '=', $product->id)->firstOrFail();
            if ($request->input('category') != $productCategory->category->id) {
                $productCategory->category_id = $request->input('category');
                $productCategory->save();
            }

            if ($request->hasFile('image')) {
                $request->file('image');
                $data['image'] = $request->file('image')->getClientOriginalName();
                $request->image->storeAs('images', $request->file('image')->getClientOriginalName(), 'images');
            }

            $product->update($data);
            $request->session()->flash('success', 'alterado com sucesso');
            return response()->redirectToRoute('products');
        }catch (Exception $e) {
            $request->session()->flash('error', 'Oops algo deu errado'); 
            return response()->redirectToRoute('products');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        try {
            ProductCategorys::where('product_id', '=', $product->id)->delete();
            $product->delete();
            $request->session()->flash('sucess', 'deletado com sucesso');
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops algo deu errado');
        }
    }
}
