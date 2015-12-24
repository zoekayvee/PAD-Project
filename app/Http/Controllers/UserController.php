<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Controllers\Controller;
use App\User;

use Request;

class UserController extends Controller {

	public function get() {
		$users = User::all();
		return view('pages/user', compact('users'));
	}

	public function create() {
		return view('pages/register');
	}

	public function register(CreateUserRequest $request) {
		$userInfo = Request::all();

		$account = new User;
		$account->firstname = $userInfo['firstname'];
		$account->middlename = $userInfo['middlename'];
		$account->lastname = $userInfo['lastname'];
		$account->email = $userInfo['email'];
		$account->password = $userInfo['password'];
		$account->studno = $userInfo['studno'];
		$account->department = $userInfo['department'];

		$account->save();

		return redirect('users');
	}

}