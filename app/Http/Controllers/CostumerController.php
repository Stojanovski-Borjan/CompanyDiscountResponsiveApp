<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deal;
use App\Costumer;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreImageRequest;
use App\ImagesDeal;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $deal = Deal::with(["category", "company"])->find($id);
        $url = $request->url();

        // dd($url);
        return view('product.buy', compact('deal' ))->with('deal', $deal);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deal = Deal::all();
        $customer = Costumer::all();
       
        return view('product.create', compact('deal', 'customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $customer = new Costumer();
        $customer->fullName = $request->get('fullName');
        $customer->companyName = $request->get('companyName');
        $customer->numOfEmployee = $request->get('numOfEmployee');
        $customer->phone = $request->get('phone');
        $customer->deal_id = $request->get('deal_id');
        $customer->save();
        
        return redirect('/')->with('success', 'Thanks for order!');
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
