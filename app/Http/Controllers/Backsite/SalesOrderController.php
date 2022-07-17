<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;

// use library here
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// use request here
use App\Http\Requests\SalesOrder\StoreSalesOrderRequest;

// use everything here
use Auth;

// use model here
use App\Models\User;
use App\Models\Product;
use App\Models\SalesOrder;

// third party package 

class SalesOrderController extends Controller
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
        $sales_order = SalesOrder::orderBy('created_at', 'desc')->get();

        $user = User::orderBy('created_at', 'desc')->get();
        $product = Product::orderBy('created_at', 'desc')->get();
        
        return view('pages.backsite.sales-order.index', compact('sales_order', 'user', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalesOrderRequest $request)
    {
        // get all request from frontsite
        $data = $request->all();

        $product = Product::where('id', $data['product_id'])->first();

        // set transaction
        $price = $product->price;
        $jumlah_barang = $data['jumlah_barang'];
        
        // total
        $total = $price * $jumlah_barang; 
        
        // save to database
        $sales_order = new SalesOrder;
        $sales_order->users_id = $data['user_id'];
        $sales_order->product_id = $data['product_id'];
        $sales_order->jumlah_barang = $jumlah_barang;
        $sales_order->total = $total;
        $sales_order->save();
        
        // update status product
        $product = Product::find($product->id);
        $sisa_barang = $product->qty - $jumlah_barang;
        $product->qty = $sisa_barang;
        $product->save();

        alert()->success('Success Message', 'Successfully added new Transactions');
        return redirect()->route('backsite.sales-order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
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
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }
}
