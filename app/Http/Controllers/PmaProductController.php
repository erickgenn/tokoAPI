<?php

namespace App\Http\Controllers;

use App\Models\pma_product;
use Illuminate\Http\Request;


class PmaProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pma_product::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' =>'required | min:3',
            'quantity' => 'required | numeric | min:1',
            'capital_price' => 'required | numeric | min:25 | lt:price',
            'price' => 'required | numeric | min:25'
        ]);

        $product = Pma_product::create($request->all());

        return response()->json($product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pma_product  $pma_product
     * @return \Illuminate\Http\Response
     */
    public function show($sku)
    {
        $data = Pma_product::where('product_sku', $sku)->get();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pma_product  $pma_product
     * @return \Illuminate\Http\Response
     */
    public function edit(pma_product $pma_product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pma_product  $pma_product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sku)
    {
        $search = Pma_product::findOrFail($sku);
        
            $validator = $this->validate($request, [
                'name' =>'required | min:3',
                'quantity' => 'required | numeric | min:1',
                'capital_price' => 'required | numeric | min:25 | lt:price',
                'price' => 'required | numeric | min:25'
            ]);
                   
                Pma_product::where('product_sku', $sku)->update($request->all());
                return response()->json('Data Has Been Updated');    
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pma_product  $pma_product
     * @return \Illuminate\Http\Response
     */
    public function destroy(pma_product $pma_product)
    {
        //
    }

    public function delete($sku)
    {
        $quantity = Pma_product::where('product_sku', $sku)->value('quantity');
        
        if($quantity>0){
            return response()->json("The Product Still Has A Quantity or Quantities");
        } else {
            $product = Pma_product::where('product_sku', $sku);
            $product-> delete();
    
            return response()->json('Data Has Been Deleted');
        }
    }
}
