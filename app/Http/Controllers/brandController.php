<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Brands;
use Illuminate\Support\Facades\Validator;
class brandController extends Controller
{
    //
    function index()
    {
    	return view('insertBrand');
    }
    function insertBrand(Request $req)
    {
    	$new = new Brands;

    	$val = Validator::make($req->all(),[
    		"brandName"=> 'required'
    	]);

    	if($val->fails())
    	{
    		return redirect()->back()->withErrors($val);
    	}
    	$new->brandName = $req->brandName;
    	$new->save();
    	return view('index');
    }
}
