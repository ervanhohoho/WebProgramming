<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    //
    public function index()
	{
		if(Auth::check() && Auth::user()->role=="Admin")
			return redirect('/adminPage');
		else if(Auth::check() && Auth::user()->role=="User")
			return redirect('/userPage');
		else
			return view('index');
	}
    public function registerView()
    {
    	return view('registerView');
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
		$start = date('Y-m-d', strtotime('-10 years'));
		$users = new User;

		$validator = Validator::make($req->all(),
			[
				"name" => 'required|min:3',
				"email" => 'required',
				"password" => 'required|min:5|confirmed',
				"profilepicture" => 'required|file|image',
				"gender"=>'required|in:Male,Female',
				"dob" => 'required|date|before:start_date',
				"address" => 'required|min:10'
			],
			[
				"before" => 'user must be more than 10 years old'
			]
		);

		if($validator->fails())
		{
			return redirect()->back()->withErrors($validator);
		}

		$file->move('Uploads',$file->getClientOriginalName());
		$filep = 'Uploads/' . $file->getClientOriginalName();
		$users->name = $name;
		$users->password = bcrypt($password);
		$users->email = $email;
		$users->profilePicture = $filep;
		$users->gender = $gender;
		$users->DOB = $DOB;
		$users->address = $address;
		$users->role = "User";
		$users->save();
		return view('index')->with('users',$users);

	}
	public function insertUser()
	{
		return view ('insertUser');
	}
	public function updateUser()
	{
		$u = User::all();
		return view('updateUser')->with('users',$u);
	}
	public function updateUserDetail($id)
	{
		$u = User::find($id);
		return view('updateUserDetail')->with('user',$u);
	}

	public function doUpdateUser(Request $req)
	{
		$name = $req->name;
		$email = $req->email;
		$gender = $req->gender;
		$DOB = $req->dob;
		$address = $req->address;
		$file = $req->picture;
		
		$users = User::find($req->id);

		$validator = Validator::make($req->all(),
			[
				"name" => 'required|min:3',
				"email" => 'required',
				"file" => 'mimes:jpg,png',
				"gender"=>'required|in:Male,Female',
				"DOB" => 'date_format:yyyy-MM-dd|after:10 years',
				"address" => 'required|min:10'
			]);

		if($validator->fails())
		{
			return redirect()->back()->withErrors($validator);
		}
		if(isset($file))	
		{		
			$file->move('Uploads',$file->getClientOriginalName());
			$filep = 'Uploads/' . $file->getClientOriginalName();
			$users->profilePicture = $filep;
		}
		$users->name = $name;
		$users->email = $email;
		$users->gender = $gender;
		$users->DOB = $DOB;
		$users->address = $address;
		$users->save();
		return redirect('/');
	}
	public function deleteUser($id)
	{
		$u = User::find($id);
		$u->delete();
		return redirect('/');
	}
	// public function login(Request $req)
	// {
	// 	$email = $req->email;
	// 	$password = $req->password;
	// 	$tuser = new Users;
	// 	$role = "User";
	// 	$users = Users::All();
	// 	$flag = false;
	// 	$request
				
	// 	if (session()->has('users')) {

	// 		if($flag == true)
	// 		{
	// 			$logged = "true";
	// 			if($tuser->role == "Admin")
	// 				return redirect()->route('admin',['id'=>$tuser->userId]);
	// 			else
	// 				return redirect()->route('user',['id'=>$tuser->userId]);
	// 		}
	// 		else
	// 		{
	// 			return view('login')->with('status',"Username or password is wrong");
	// 		}    
	// 	}
	// 	else
	// 	{
	// 		$val = Validator::make($req->all(),["email" => 'required', "password"=>'required'],['required'=>'please input :attribute']);
	// 		if($val->fails())
	// 			return redirect()->back()->withErrors($val);
	// 		foreach ($users as $u) {
	// 			# code...
	// 			if($u->email == $email)
	// 			{

	// 				if($u->password == $password)
	// 				{
	// 					$flag = true;
	// 					$tuser = $u;
	// 					return view('admin');	
	// 				}
	// 			}
	// 			else
	// 			{
	// 				return view('login')->with('status',"Username or password is wrong");
	// 			}    
	// 		}
	// 		//$request->session()->put('key', 'value');
	// 		//return view('login');
	// 	}
		
	// }
	public function login(Request $req)
	{

		if (Auth::attempt([
			'email' => $req->email, 
			'password' => $req->password])) {
            // Authentication passed...
            return redirect('/adminPage');
        }else
        {
        	return redirect('/');
        }
	}
	public function sessionLogin(Request $request, $id)
    {
        $value = $request->session()->get('key', 'default');
    }
    public function logout()
    {
    	Auth::logout();
    	return redirect('/');
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
