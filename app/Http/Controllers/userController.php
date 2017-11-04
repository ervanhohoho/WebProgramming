<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Users;

class userController extends Controller
{
    //
    public function registerView()
    {
    	return view('registerView');
    }
	public function index()
	{
		$users = Users::All();
		return view('index');
	}
	public function register(Request $req)
	{
		$name = $req->name;
		$email = $req->email;
		$password = $req->password;
		//$profilePicture = $req->profilepicture;
		$gender = $req->gender;
		$DOB = $req->dob;
		$address = $req->address;
		$file = $req->profilepicture;
		$file->move('Uploads',$file->getClientOriginalName());
		$filep = '/public/Uploads/' . $file->getClientOriginalName();
		$users = new Users;
		$users->name = $name;
		$users->password = $password;
		$users->email = $email;
		$users->profilePicture = $filep;
		$users->gender = $gender;
		$users->DOB = $DOB;
		$users->address = $address;

		$users->save();
		$users = Users::All();
		return view('index')->with('users',$users);

	}
	public function login(Request $req)
	{
		$email = $req->email;
		$password = $req->password;
		$users = Users::All();
		$flag = false;
		foreach ($users as $u) {
			# code...
			if($u->email == $email)
				if($u->password == $password)
					$flag = true;
		}
		if($flag == true)
		{
			$logged = "true";
			return view('loginSuccess');
		}
		else
		{
			return view('login');
		}
	}
}
