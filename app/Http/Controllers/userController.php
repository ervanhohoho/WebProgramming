<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Users;
use Illuminate\Support\Facades\Validator;

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
		$filep = 'Uploads/' . $file->getClientOriginalName();
		$users = new Users;
		$users->name = $name;
		$users->password = $password;
		$users->email = $email;
		$users->profilePicture = $filep;
		$users->gender = $gender;
		$users->DOB = $DOB;
		$users->address = $address;
		$users->role = "User";
		$users->save();
		$users = Users::All();
		return view('index')->with('users',$users);

	}
	public function login(Request $req)
	{
		$email = $req->email;
		$password = $req->password;
		$tuser = new Users;
		$role = "User";
		$users = Users::All();
		$flag = false;
		$val = Validator::make($req->all(),["email" => 'required', "password"=>'required']);
		if($val->fails())
			return redirect()->back()->withErrors($val);
		foreach ($users as $u) {
			# code...
			if($u->email == $email)
			{
				if($u->password == $password)
				{
					$flag = true;
					$tuser = $u;
					if($u->role == "Admin")
						$role = "Admin";
				}
			}
		}
		if($flag == true)
		{
			$logged = "true";
			if($tuser->role == "Admin")
				return redirect()->route('admin',['id'=>$tuser->userId]);
			else
				return redirect()->route('user',['id'=>$tuser->userId]);
		}
		else
		{
			return view('login')->with('status',"Username or password is wrong");
		}
	}
	public function adminPage(Request $req)
	{
		return view('admin')->with('id',$req->id);
	}
	public function userPage(Request $req)
	{
		return view('user')->with('id',$req->id);
	}
}
