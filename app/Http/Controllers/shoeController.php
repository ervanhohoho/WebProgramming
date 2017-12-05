<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Shoes;
use App\Brands;
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
		$image->move('Uploads',$image->getClientOriginalName());
		
		$shoes = new Shoes;
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
    	$shoe = Shoes::where('shoesId', $req->id)->firstOrFail();
    	$shoe->name = $req->name;
    	$image = $req->image;
    	$image->move('Uploads',$image->getClientOriginalName());
    	$shoe->image = 'Uploads/'.$req->image;
    	$shoe->brandId = $req->brandId;
    	$shoe->description = $req->description;
    	$shoe->price = $req->price;
    	$shoe->discount = $req->discount;
    	$shoe->stock = $req->stock;
    	$shoe->save();
    }
    public function index()
    {
    	$brands = Brands::All();
    	return view('insertShoe')->with('brands',$brands);
    }
    public function viewData(Request $req)
    {
		$a = Shoes::where('name','like','%'.$req->search.'%')->Paginate(8); 
		return view('catalog')->with('data',$a);
    }
}
