<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Resources\Category as CategoryResource;

class CategoryController extends Controller
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
        $pages = Category::all();
        return view( 'admin.pages.category.categorys', compact('pages') );
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
            Category::create($request->all());
            $request->session()->flash('success', 'criado com sucesso');
            return response()->redirectToRoute('categorys');
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops algo deu errado'); 
            return response()->redirectToRoute('categorys');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        try {
            return new CategoryResource($category);
        }catch (Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        try{
            $category->update($request->all());
            $request->session()->flash('success', 'alterado com sucesso');
            return response()->redirectToRoute('categorys');
        }catch (Exception $e) {
            $request->session()->flash('error', 'Oops algo deu errado'); 
            return response()->redirectToRoute('categorys');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category)
    {
        try {
            $category->delete();
            $request->session()->flash('success', 'deletado com sucesso');
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops algo deu errado');
        }
    }


    public function all()
    {
        try {
            return CategoryResource::collection(Category::All());
        }catch (Exception $e){
            return response()->json(['error' => $e->getMessage()]); 
        }
    }
}
