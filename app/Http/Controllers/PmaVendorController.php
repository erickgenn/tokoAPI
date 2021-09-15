<?php

namespace App\Http\Controllers;

use App\Models\pma_vendor;
use Illuminate\Http\Request;

class PmaVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pma_vendor::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $vendor = Pma_vendor::create($request->all());
        return response()->json($vendor);
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
     * @param  \App\Models\pma_vendor  $pma_vendor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pma_vendor::where('vendor_id', $id)->get();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pma_vendor  $pma_vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(pma_vendor $pma_vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pma_vendor  $pma_vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $search = Pma_vendor::findOrFail($sku);
        
        $validator = $this->validate($request, [
            'vendor_name' =>'required | min:3',
        ]);
               
        Pma_vendor::where('vendor_id', $id)->update($request->all());
        return response()->json('Data Has Been Updated');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pma_vendor  $pma_vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(pma_vendor $pma_vendor)
    {
        //
    }

    public function delete($id)
    {
    	$vendor = Pma_vendor::where('vendor_id', $id);
    	$vendor-> delete();
 
    	return response()->json('Data Has Been Deleted');
    }
}
