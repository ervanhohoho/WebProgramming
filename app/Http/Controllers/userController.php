<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    //mereturn ke view index, jika sudah login maka akan masuk ke page sesuai dengan rolenya masing masing
    public function index()
	{
		//Cek role user yang login
		if(Auth::check() && Auth::user()->role=="Admin")
			return redirect('/adminPage');
		else if(Auth::check() && Auth::user()->role=="User")
			return redirect('/userPage');
		else
			return view('index');
	}
	//redirect ke view register
    public function registerView()
    {
    	return view('registerView');
    }
	//register data user baru ke dalam table user
	public function register(Request $req)
	{
		//memasukkan data ke dalam temporary variables
		$name = $req->name;
		$email = $req->email;
		$password = $req->password;
		$gender = $req->gender;
		$DOB = $req->dob;
		$address = $req->address;
		$file = $req->profilepicture;
		$start = date('Y-m-d', strtotime('-10 years'));
		$users = new User;
		//validasi input yang didapat dari view
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
		//jika gagal maka kembali dengan error
		if($validator->fails())
		{
			return redirect()->back()->withErrors($validator);
		}
		//memasukkan data ke dalam database
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
	//return ke view inserUser
	public function insertUser()
	{
		//return ke view insertUser
		return view ('insertUser');
	}
	//redirect ke view updateUser
	public function updateUser()
	{
		$u = User::all();
		return view('updateUser')->with('users',$u);
	}
	//redirect ke view detailUpdateUser dengan id yang dikirimkan
	public function updateUserDetail($id)
	{
		$u = User::find($id);
		return view('updateUserDetail')->with('user',$u);
	}
	//update user dengan data yang ada di field
	public function doUpdateUser(Request $req)
	{
		//memasukkan data yang didapat dari field di view ke dalam temporary variables
		$name = $req->name;
		$email = $req->email;
		$gender = $req->gender;
		$DOB = $req->dob;
		$address = $req->address;
		$file = $req->picture;
		//mencari user dengan id yang sama dengan yang diterima
		$users = User::find($req->id);
		//validasi semua field yang ada di view sesuai dengan kriteria yang diberikan
		$validator = Validator::make($req->all(),
			[
				"name" => 'required|min:3',
				"email" => 'required',
				"picture" => 'image',
				"gender"=>'required|in:Male,Female',
				"dob" => 'before:start_date',
				"address" => 'required|min:10'
			],
			[
				"before" => "you must be older than 10 years old"
			]
		);
		//jika fail kembali dengan error
		if($validator->fails())
		{
			return redirect()->back()->withErrors($validator);
		}
		//jika file gambar diisi maka diupdate, jika tidak maka tidak diupdate
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
		$users->save(); //save row user yang diupdate

		//mengambil semua user untuk dikembalikan ke view updateuser
		$users = User::all();
		return redirect('/updateUser')->with('users',$users);
	}
	//delete user sesuai dengan id yang diterima
	public function deleteUser($id)
	{
		//cari user sesuai dengan id yang diterima
		$u = User::find($id);
		$u->delete(); //delete user
		return redirect('/');
	}

	//login
	public function login(Request $req)
	{
		//mencoba login dengan Auth, lalu diredirect ke /adminPage, jika fail maka ke /userPage
		if (Auth::attempt([
			'email' => $req->email, 
			'password' => $req->password])) {
            // Authentication passed...
            return redirect('/adminPage');
        }else
        {
        	$status = "Username or password is wrong";
        	return redirect()->back()->with('status',$status);
        }
	}
	//return ke profile
	public function profile()
    {
       	return view('profileView');
    }
    //return ke logout
    public function logout()
    {
    	Auth::logout();
    	return redirect('/');
    }
    //return ke adminPage
	public function adminPage(Request $req)
	{
		return view('admin')->with('id',$req->id);
	}
	//return ke userPage
	public function userPage(Request $req)
	{
		return view('user')->with('id',$req->id);
	}
}
