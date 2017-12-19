<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Transaction;
use App\detailTransaction;
use Auth;
use App\User;
use App\Shoes;
use App\Brands;
use App\Cart;

class transactionController extends Controller
{
    //melakukan pembayaran virtual
    public function pay(Request $req)
    {
        //Mengosongkan cart yang usernyanya idnya sedang login
    	Cart::where('cartId', 'like', Auth::user()->userId.'#%')->delete();
        $shoesids = $req->shoesId;
        $qtys = $req->qty;
        //Membuat row transaksi baru
        $new = new Transaction;
        $new->userId = Auth::user()->userId;
        $new->transactionDateTime = date('Y-m-d H:i:s');
        $new->save();
        //mengambil id dari transaksi terakhir yang dibuat
        $tid = Transaction::all()->last()->transactionId;
        //counter akses items yang ada di dalam cart
        $counter = 0;
        foreach($shoesids as $s)
        {
            //Membuat row untuk setiap detail transaction
        	$newDetail = new detailTransaction;
        	$newDetail->detailTransactionId = $tid.'#'.$s;
        	$newDetail->qty = $qtys[$counter];
        	$counter++;
        	$newDetail->save();
        }
        return redirect('/');
    }
    //menambahkan item kedalam cart
    public function addToCart(Request $req)
    {
        //cek jika user sudah login
        if(Auth::check())
        {
            //mencari cart yang useridnya sama dengan id yang sedang login
            $cart = Cart::find(Auth::user()->userId.'#'.$req->id);
            //jika cart sudah ada isi dengan barang yang sama, maka jumlah hanya akan ditambah
            if(isset($cart))
            {
                $cart->qty += $req->qty;
                $cart->save();
            }
            else //jika belum ada maka akan dibuat baru
            {
                $cart = new Cart;
                $cart->cartId = Auth::user()->userId.'#'.$req->id;;
                $cart->qty = $req->qty;
                $cart->save();
            }
            return redirect('/cart');
        }

        return redirect ('/');
    }
    //Menampilkan view cart
    public function showCart()
    {
        //Mengambil semua sepatu yang ada
        $shoes = Shoes::all();
        //mengambil id yang dimasukan kedalam array
        $shoesIds = Shoes::all()->pluck('shoesId');
        //mengambil cartId yang id usernya sama dengan user yang sedang login
        $cart = Cart::where('cartId', 'like',Auth::user()->userId.'#%')->get();
        return view('cart')->with('cart',$cart)->with('shoes',$shoes)->with('shoesIds',$shoesIds);
    }
    //Menghilangkan suatu item dari cart
    public function deleteCart($id)
    {
        //Delete cart
    	Cart::where('cartId',Auth::user()->userId.'#'.$id)->delete();
    	return redirect()->back();
    }
    //Menampilkan view transactionHistory
    public function transactionHistory()
    {
        $role = Auth::user()->role;
        if($role == "Admin")//jika admin maka bisa melihat semua transaksi
    	{
            $transactions = Transaction::all();
            $users = User::all();
            $userids = User::all()->pluck('userId');
            return view('transactionHistoryAdmin')->with('transactions',$transactions)->with('users',$users)->with('userids',$userids)->with('role',$role);
        }
        else //jika user maka hanya bisa lihat semua transaksi yang dilakukan oleh user tsb
        {
            $transactions = Transaction::where('userId',Auth::user()->userId)->get();
            $users = User::all();
            $userids = User::all()->pluck('userId');
            return view('transactionHistoryUser')->with('transactions',$transactions)->with('users',$users)->with('userids',$userids)->with('role',$role);
        }
    }
    //Menampilkan detailTransaction dari list yang ada di transactionHistory
    public function detailTransaction($id)
    {
        //mencari transaksi sesuai dengan yang idnya sama dengan user yang transaksinya dipilih di historyTransaction 
    	$details = detailTransaction::where('detailTransactionId','like',$id.'#%')->get();
    	$shoes = Shoes::all();
    	$shoesids = Shoes::all()->pluck('shoesId');
    	return view('detailTransaction')->with('details',$details)->with('shoes',$shoes)->with('shoesids',$shoesids);
    }
    //Delete Transaction dari list Transaction
    public function deleteTransaction($id)
    {
        Transaction::where('transactionId',$id)->delete();
        return redirect()->back();
    }
}
