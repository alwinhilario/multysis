<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Find Product Object
        $product = Product::findOrFail($id = $request['id']);

        // Validate Form
        $data = Validator::make($request->all(), [
            'available_stock' => ['required', 'numeric', "min:1", "max:$product->available_stock"]
        ], [
            'available_stock.max' => 'Failed to order this product due to unavailability of the stock.'
        ]);

        // If Validation Form failed, return with 'Hash'
        $redirectWithHash = redirect(url()->previous() . "#$id");
        if ($data->fails()) return $redirectWithHash->withErrors($data);

        // Store new Order
        auth()->user()->orders()->create([
            'quantity' => $stocks = $request['available_stock']
        ]);

        // Update Product Stocks
        $product->update([
            'available_stock' => $product->available_stock - $stocks
        ]);

        return $redirectWithHash->with([
            'mySuccess' => ['You have successfully ordered this product.']
        ]);
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
}
