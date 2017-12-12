<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Shoes;
use App\Brands;
use Illuminate\Support\Facades\Validator;
class shoeController extends Controller
{
    //
    public function insertShoe(Request $req)
    {
    	$name = $req->name;
		$image = $req->image;
		$brandId = $req->brand;
		$description = $req->description;
		$price = $req->price;
		$discount = $req->discount;
		$stock = $req->stock;
		$shoes = new Shoes;

		$val = Validator::make($req->all(),[

			"name"=>'required|min:3',
			"image"=>'required|mimes:jpg,png',
			"brandId"=> 'required',
			"description" => 'required',
			"price" => 'required|regex:[0-9]',
			"discount" => 'required|min:0|max:100|regex:[0-9]',
			"stock" => 'required|min:0|max:100|regex:[0-9]'
		]);

		if($val->fails())
		{
			return redirect()->back()->withErrors($val);
		}

		$image->move('Uploads',$image->getClientOriginalName());

		$shoes->name = $name;
		$shoes->image = 'Uploads/'.$image->getClientOriginalName();
		$shoes->brandId = $brandId;
		$shoes->description = $description;
		$shoes->price = $price;
		$shoes->discount = $discount;
		$shoes->stock = $req->stock;



		$shoes->save();
		$shoes = Shoes::All();
		return view ('index');
    }
    public function updateShoeView(Request $req)
    {
    	$a = Shoes::where('name','like','%'.$req->search.'%')->Paginate(8); 
        return view('updateShoe')->with('shoes',$a);
    }
    public function updateShoeEditView(Request $req)
    {
    	$shoes = Shoes::where('shoesId', $req->id)->firstOrFail();
    	$brands = Brands::All();
    	return view('updateShoeEdit')->with('shoes',$shoes)->with('brands',$brands);
    }

    public function updateShoe(Request $req)
    {
    	$id = $req->id;
    	$shoe = Shoes::find($req->id);
    	$shoe->name = $req->name;
    	$image = $req->image;
        if(isset($req->image))
        {
        	$image->move('Uploads',$image->getClientOriginalName());
        	$shoe->image = 'Uploads/'.$req->image;
    	}
        $shoe->brandId = $req->brandId;
    	$shoe->description = $req->description;
    	$shoe->price = $req->price;
    	$shoe->discount = $req->discount;
    	$shoe->stock = $req->stock;
    	$shoe->save();
        return redirect('/');
    }
    public function index()
    {
    	$brands = Brands::All();
    	return view('insertShoe')->with('brands',$brands);
    }
    public function viewData(Request $req)
    {
        $cart = session('cart');
		$a = Shoes::where('name','like','%'.$req->search.'%')->Paginate(8); 
		return view('catalog')->with('data',$a);
    }
    public function detailShoe($id)
    {
        $shoe = Shoes::find($id);
        return view('shoeDetail')->with('shoe',$shoe);
    }
    public function addToCart(Request $req)
    {
        $cart = session('cart');
        if(!isset($cart[$req->id]))
            $cart[$req->id]=$req->qty;
        else
            $cart[$req->id]=$cart[$req->id]+$req->qty;
        session(['cart'=>$cart]);
        return redirect('/cart');
    }

    public function showCart()
    {
        $shoes = Shoes::all();
        $cart = session('cart');
        return view('cart')->with('cart',$cart)->with('shoes',$shoes);
    }
}
