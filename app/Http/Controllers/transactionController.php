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
    //

    public function pay(Request $req)
    {
    	Cart::where('cartId', 'like', Auth::user()->userId.'#%')->delete();
        $shoesids = $req->shoesId;
        $qtys = $req->qty;
        $new = new Transaction;
        $new->userId = Auth::user()->userId;
        $new->transactionDateTime = date('Y-m-d H:i:s');
        $new->save();
        $tid = Transaction::all()->last()->transactionId;
        $counter = 0;
        foreach($shoesids as $s)
        {
        	$newDetail = new detailTransaction;
        	$newDetail->detailTransactionId = $tid.'#'.$s;
        	$newDetail->qty = $qtys[$counter];
        	$counter++;
        	$newDetail->save();
        }
        return redirect('/');
    }
    public function addToCart(Request $req)
    {
        if(Auth::check())
        {
            $cart = Cart::find(Auth::user()->userId.'#'.$req->id);
            if(isset($cart))
            {
                $cart->qty += $req->qty;
                $cart->save();
            }
            else
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

    public function showCart()
    {
        $shoes = Shoes::all();
        $shoesIds = Shoes::all()->pluck('shoesId');
        $cart = Cart::where('cartId', 'like',Auth::user()->userId.'#%')->get();
        return view('cart')->with('cart',$cart)->with('shoes',$shoes)->with('shoesIds',$shoesIds);
    }
    public function deleteCart($id)
    {
    	Cart::where('cartId',Auth::user()->userId.'#'.$id)->delete();
    	return redirect()->back();
    }
    public function transactionHistory()
    {
        $role = Auth::user()->role;
        if($role == "Admin")
    	{
            $transactions = Transaction::all();
            $users = User::all();
            $userids = User::all()->pluck('userId');
            return view('transactionHistoryAdmin')->with('transactions',$transactions)->with('users',$users)->with('userids',$userids)->with('role',$role);
        }
        else
        {
            $transactions = Transaction::where('userId',Auth::user()->userId)->get();
            $users = User::all();
            $userids = User::all()->pluck('userId');
            return view('transactionHistoryUser')->with('transactions',$transactions)->with('users',$users)->with('userids',$userids)->with('role',$role);
        }
    }
    public function detailTransaction($id)
    {
    	$details = detailTransaction::where('detailTransactionId','like',$id.'#%')->get();
    	$shoes = Shoes::all();
    	$shoesids = Shoes::all()->pluck('shoesId');
    	return view('detailTransaction')->with('details',$details)->with('shoes',$shoes)->with('shoesids',$shoesids);
    }
    public function deleteTransaction($id)
    {
        Transaction::where('transactionId',$id)->delete();
        return redirect()->back();
    }
}
