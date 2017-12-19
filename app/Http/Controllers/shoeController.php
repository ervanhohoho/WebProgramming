<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Shoes;
use App\Brands;
use App\Cart;
use Illuminate\Support\Facades\Validator;
class shoeController extends Controller
{
    //Input data sepatu dalam database
    public function insertShoe(Request $req)
    {
    	//pemasukan data dari field di view ke dalam variabel
        $name = $req->name;
		$image = $req->image;
		$brandId = $req->brand;
		$description = $req->description;
		$price = $req->price;
		$discount = $req->discount;
		$stock = $req->stock;
		$shoes = new Shoes;

        //Validasi field yang mau diinput untuk sepatu
		$val = Validator::make($req->all(),[

			"name"=>'required|min:3',
			"image"=>'required|image',
			"brandId"=> 'min:0',
			"description" => 'required',
			"price" => 'required',
			"discount" => 'required|min:0|max:100',
			"stock" => 'required|min:0|max:100'
		]);

        //Jika field ada yang tidak sesuai maka akan dikembalikan ke view insertShoe dan ditampilkan errornya
		if($val->fails())
		{
			return redirect()->back()->withErrors($val);
		}
        //Memindahkan gambar ke folder public/Uploads (karena pakai folder public)
		$image->move('Uploads',$image->getClientOriginalName());
        //Membuat row baru dan insert datanya
		$shoes->name = $name;
		$shoes->image = 'Uploads/'.$image->getClientOriginalName();
		$shoes->brandId = $brandId;
		$shoes->description = $description;
		$shoes->price = $price;
		$shoes->discount = $discount;
		$shoes->stock = $req->stock;
        //Save row baru
		$shoes->save();
		return view ('index');
    }
    //redirect ke page updateShoe dengan data Shoes
    public function updateShoeView(Request $req)
    {
        //Mengambil data dari database dan dipaginate lalu dikirim ke view
    	$a = Shoes::where('name','like','%'.$req->search.'%')->Paginate(8); 
        return view('updateShoe')->with('shoes',$a);
    }
    //menampilkan detail shoe untuk diupdate
    public function updateShoeEditView(Request $req)
    {
        //Menerima id dari updateShoeView lalu dicari sepatu yang idnya sama dengan id yang diterima
    	$shoes = Shoes::where('shoesId', $req->id)->firstOrFail();
    	$brands = Brands::All();
    	return view('updateShoeEdit')->with('shoes',$shoes)->with('brands',$brands);
    }
    //melakukan update sepatu di database melalui model Shoe
    public function updateShoe(Request $req)
    {
        //mengambil field dari updateShoeEditView lalu dicari shoe yang idnya sama dengan yg diterima, lalu diedit langsung
    	$id = $req->id;
    	$shoe = Shoes::find($req->id);
    	$shoe->name = $req->name;
    	$image = $req->image;
        //jika gambar tidak diupload maka gambar tidak diupdate
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
        return redirect('/updateShoe');
    }
    //redirect ke view insertShoe
    public function index()
    {
    	$brands = Brands::All();
    	return view('insertShoe')->with('brands',$brands);
    }
    //redirect ke katalog sepatu (view viewData)
    public function viewData(Request $req)
    {
		$a = Shoes::where('name','like','%'.$req->search.'%')->Paginate(8); 
		return view('catalog')->with('data',$a);
    }
    //memberikan detail sepatu yang dipilih di viewData
    public function detailShoe($id)
    {
        $shoe = Shoes::find($id);
        return view('shoeDetail')->with('shoe',$shoe);
    }
}
