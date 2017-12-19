<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Brands;
use Illuminate\Support\Facades\Validator;
class brandController extends Controller
{
    //redirect ke view insertBrand
    function index()
    {
    	return view('insertBrand');
    }
    //masukan brand baru ke dalam database
    function insertBrand(Request $req)
    {
        //membuat objek row brand baru
    	$new = new Brands;
        //validasi nama brand tidak kosong
    	$val = Validator::make($req->all(),[
    		"brandName"=> 'required'
    	]);
        //jika fail kembail ke view insertBrand disertai error
    	if($val->fails())
    	{
    		return redirect()->back()->withErrors($val);
    	}
    	$new->brandName = $req->brandName;
    	$new->save(); //save row tsb
    	return redirect('/');
    }
    //menampilkan view updateBrand
    function updateBrand()
    {
        //mengambil semua data brand dan dikirim ke view
        $brands = Brands::All();
        return view('updateBrand')->with('brands',$brands);
    }
    //menampilkan detail brand yang akan diupdate
    function updateBrandDetail($id)
    {
        //mencari brand yang idnya sama dengan diterima
        $brand = Brands::find($id);
        return view('updateBrandDetail')->with('brand',$brand);
    }
    //melakukan update brand ke dalam database
    function doUpdateBrand(Request $req)
    {
        //mencari id di tabel brand yang idnya sama dengan yang diterima
        $temp = Brands::find($req->id);
        $temp->brandName = $req->brandName;
        $temp->save(); //save data yang sudah diupdate
        return redirect('/');
    }
}
