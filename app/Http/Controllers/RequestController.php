<?php

namespace App\Http\Controllers;

use App\Request as Pedido;
use App\Product;
use App\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
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
        $pages = Pedido::where('user_id',Auth::id())->get();
        return view( 'admin.pages.request.index', compact('pages') );
    }

    public function shopping(Request $request)
    {
        try {
            $products = [];
            $pages = ProductResource::collection(Product::all());
            if (array_key_exists('products', $request->session()->all())) {
                $products = $request->session()->all()['products'];
                if (count($products)) {
                    foreach ($pages as $key => $value) {
                        $value->qtd = $value->qtd - $products[$value->name]['qtd'];
                    }
                }
            }
            return view( 'admin.pages.product.shopping', compact('pages') );
        }catch (Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function setItems(Request $request)
    {
        try{
            $data['products'][$request->input('product')] = $request->all();
            unset($data['products'][$request->input('product')]['_token']);
            session($data);
            $request->session()->flash('success', 'adicionado com sucesso');
            return response()->redirectToRoute('compras');
        }catch (Exception $e){
            $request->session()->flash('error', 'Oops algo deu errado');
            return response()->redirectToRoute('compras');
        }
    }

    public function getItems(Request $request)
    {
        try {
            $costTotal = 0;
            $products = [];
            if (array_key_exists('products', $request->session()->all() ) ) {
                $products = $request->session()->all()['products'];
                foreach ($products as $key => $value) {
                    $costTotal += $value['qtd'] * $value['cost']; 
                }
            }
            return view( 'admin.pages.request.pending', compact('products', 'costTotal') );
        }catch (Exception $e){
            var_dump($e->getMessage);
        }
    }

    public function removeItems(Request $request)
    {
        try {
            $data = $request->all();
            $products = [];
            if (array_key_exists('products', $request->session()->all() ) ) {
                $products = $request->session()->all()['products'];
                unset($products[$data['product']]);
            }
            session(['products' => $products]);
            $request->session()->flash('success', 'removido com sucesso');
            return response()->redirectToRoute('getCar');
        }catch (Exception $e){
            $request->session()->flash('error', 'Oops algo deu errado');
            return response()->redirectToRoute('getCar');
        }
    }

    public function getItemsJson(Request $request , $item)
    {
        try {        
            $products = [];
            if (array_key_exists('products', $request->session()->all() ) ) {
                $products = $request->session()->all()['products'];
                foreach ($products as $key => $value) {
                    if ($value['id'] == $item) {
                        return response()->json(['data' => $products[$key]]);
                    }
                }
            }
            return response()->json(['data' => $products]);
        }catch (Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function updateItems(Request $request)
    {
        try {
            $data = $request->all();
            $products = [];
            if (array_key_exists('products', $request->session()->all() ) ) {
                $products = $request->session()->all()['products'];
                if ( array_key_exists($data['product'], $products ) ) {
                    $products[$data['product']]['qtd'] = $data['qtd'];
                }
            }
            session(['products' => $products]);
            $request->session()->flash('success', 'alterado com sucesso');
            return response()->redirectToRoute('getCar');
        }catch (Exception $e){
            $request->session()->flash('error', 'Oops algo deu errado');
            return response()->redirectToRoute('getCar');
        }
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
            $products = [];
            $totalCost = 0;
            $totalQtd = 0;
            if (array_key_exists('products', $request->session()->all() ) ) {
                $products = $request->session()->all()['products'];
            }
            foreach ($products as $key => $value) {
                $totalCost += $value['qtd'] * $value['cost'];
                $totalQtd += $value['qtd'];
            }
            $data = [
                'user_id' => Auth::id(),
                'value' => $totalCost,
                'qtd' => $totalQtd
            ];
            $order = Pedido::create($data);
            
            $orderData = [];
            foreach ($products as $key => $value) {
                $orderData[] = [
                    'product_id' => $value['id'],
                    'request_id' => $order->id,
                    'qtd' => $value['qtd'],
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ];
                $product = Product::where('id', '=', $value['id'])->firstOrFail();
                $product->qtd = $product->qtd - $value['qtd'];
                $product->save();
            }
            OrderItems::insert($orderData);

            session(['products' => []]);
            $request->session()->flash('success', 'criado com sucesso');
            return response()->redirectToRoute('compras');
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops algo deu errado'); 
            return response()->redirectToRoute('getCar');
        }
    }

    public function getOrder(Pedido $pedido)
    {
        try {
            $order = DB::table('requests')
            ->join('order_items', 'requests.id', '=', 'order_items.request_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->where('requests.id', '=', $pedido->id)
            ->select('products.name', 'products.cost', 'order_items.qtd')
            ->get();
            return response()->json(['data' => $order]);
        }catch (Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
