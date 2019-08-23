<?php

namespace App\Http\Controllers;

use App\Costumer;
use App\Deal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dealsNotApproved = Deal::where('is_approved', 0)->get();
        $dealsApproved = Deal::where('is_approved', 1)->get();
        $countDealsNotApproved = $dealsNotApproved->count();
        $countDealsApproved = $dealsApproved->count();
        $customers = Costumer::all();
            
            $categoriesDeal = Deal::where('is_approved', 1)
                ->groupBy('category_id')
                ->select('category_id', DB::raw('count(*) as total'))->get();

        $deals = Deal::with('company', 'category')->get();

        return view('dashboard', compact('deals', 'dealsNotApproved', 'dealsApproved', 'countDealsNotApproved', 'countDealsApproved', 'customers', 'categoriesDeal'));
    }

    public function approve($id)
    {
        $deal = Deal::findOrFail($id);
        $deal->is_approved = 1;
        $deal->save();

        return redirect()->route('dashboard')->withMessage('User approved successfully');
    }
}
