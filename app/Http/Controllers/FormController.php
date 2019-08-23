<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deal;
use App\Company;
use App\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreImageRequest;
use App\ImagesDeal;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $categories = Category::all();
        // $deals = Deal::with('company', 'category')->get();

        // return view('welcome')->with('deals', $deals)->with('categories', $categories);


    }

    // public function indexProduct($id)
    // {
    //     $companies = Company::all();
    //     $categories = Category::all();
    //     $image = ImagesDeal::all();
    //     $deal = Deal::with(["category", "company"])->find($id);
    //     return view('product', compact('categories', 'companies', 'deal', 'image'))->with('deal', $deal);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $deal = Deal::all();
        $categories = Category::all();
        $companies = Company::all();

        return view('forms.create', compact('deal', 'categories', 'companies'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // STORE DEALS
    public function store(Request $request)
    {
//        dd($request);

        // VALIDATION
        $validatedData = $request->validate(array(
            'name'=>'required',
            'website' => 'required',
            'facebook' => 'required',
            'googleMap' => 'required',
            'phone' => 'required|regex:/[0-9]/',
            'email' => 'required|email',
            'address' => 'required',
            'title' => 'required',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'description' => 'required',
            'inputGroup' => 'required',
        ));
        // END VALIDATION

        $thumbnail = $request->file('thumbnail');
        $thumbnailName = rand(1, 100). '-'. time();
        $thumbnailExtension = $thumbnail->getClientOriginalExtension();
        $thumbnailPath = public_path(). '/thumbnails/';
        $thumbnailFullPath = '/thumbnails/' . $thumbnailName . '.' . $thumbnailExtension;
        $thumbnail->move($thumbnailPath, $thumbnailName . '.' . $thumbnailExtension);

        // dd($thumbnail);

        $company = new Company();
        $company->name = $request->get('name');
        $company->website = $request->get('website');
        $company->facebook = $request->get('facebook');
        $company->googleMap = $request->get('googleMap');
        $company->phone = $request->get('phone');
        $company->email = $request->get('email');
        $company->address = $request->get('address');
        $company->thumbnail = $thumbnailFullPath;
        $company->save();

        $deal = new Deal();
        $deal->title = $request->get('title');
        $deal->price = $request->get('price');
        $deal->discount = $request->get('discount');
        $deal->description = $request->get('description');
        $deal->company_id = $company->id;
        $deal->category_id = $request->get('inputGroup');
        $deal->save();

        // dd('deal');
        $allImages = $request->file('images');

        if (count($allImages) > 8 || count($allImages) < 0)
        {
        return back();
        }else {

            foreach ($allImages as $image) {
                $imageName = rand(1,100) . '.' . time();
                $imageExtension = $image->getClientOriginalExtension();
                $imagePath = public_path() . '/images/';
                $imageFullPath = '/images/' . $imageName . '.' . $imageExtension;
                $image->move($imagePath, $imageName . '.' . $imageExtension);

                $imageDb = new ImagesDeal();
                $imageDb->imagePath = $imageFullPath;
                $imageDb->deal_id = $deal->id;
                $imageDb->save();
            }


        }


        return redirect('/');

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
