<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Users;

class shoeController extends Controller
{
    //
    public function insertShoe(Request $req)
    {
    	$name = $req->name;
		$image = $req->image;
		$brandId = $req->brandId;
		$description = $req->description;
		$price = $req->price;
		$discount = $req->discount;

		$shoes = new Shoes;
		$shoes->name = $name;
		$shoes->image = $image;
		$shoes->brandId = $brandId;
		$shoes->description = $description;
		$shoes->price = $price;
		$shoes->discount = $discount;

		$shoes->save();
		$shoes = Shoes::All();
		return view('home')->with('users',$users);
    }
}
