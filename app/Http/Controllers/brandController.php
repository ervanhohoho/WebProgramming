<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Brands;

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
    	$new->brandName = $req->brandName;
    	$new->save();
    	return view('index');
    }
}
