<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deal;
use App\Company;
use App\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreImageRequest;
use App\ImagesDeal;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  INDEX PAGE
     public function index()
    {
        //
        $companies = Company::all();
        $categories = Category::all();
        $deals = Deal::where('is_approved', 1)->with('company', 'category')->get();

        return view('welcome')->with('deals', $deals)->with('categories', $categories, 'companies', $companies);

    }

    // KEYUP SEARCH
    public function action(Request $request)
    {
    }


    // PRODUCT PAGE
    public function indexProduct($id)
    {
        $companies = Company::all();
        $categories = Category::all();
        $image = ImagesDeal::all();
        $deal = Deal::with(["category", "company"])->find($id);
        return view('product', compact('categories', 'companies', 'deal', 'image'))->with('deal', $deal);
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
        //
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
