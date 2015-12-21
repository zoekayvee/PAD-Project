<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller {

	//
	public function getUsers() {
		$users = User::all();
		return view('pages/user', compact('users'));
	}


}
