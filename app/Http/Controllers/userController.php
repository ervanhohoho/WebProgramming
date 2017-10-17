<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Users;

class userController extends Controller
{
    //
	public function index()
	{
		$users = Users::All();
		return view('home')->with('users',$users);
	}
	public function register(Request $req)
	{
		$name = $req->name;
		$email = $req->email;
		$password = $req->password;
		$profilePicture = $req->profilepicture;
		$gender = $req->gender;
		$DOB = $req->dob;
		$address = $req->address;

		$users = new Users;
		$users->name = $name;
		$users->password = $password;
		$users->email = $email;
		$users->profilePicture = $profilePicture;
		$users->gender = $gender;
		$users->DOB = $DOB;
		$users->address = $address;

		$users->save();
		$users = Users::All();
		return view('home')->with('users',$users);

	}
}
