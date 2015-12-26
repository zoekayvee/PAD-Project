<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller {

	//
	public function showCommittee() {
		$user = \Auth::user();
		if($user == "") return "<h1>You are not signed in! Accomplish the registration. Link at <a href='/home'>localhost:8000</a></h1>";
		return view('pages/profile', compact('user'));
	}

	public function showHeads() {
		return view('pages/heads');
	}

	public function showOAH() {
		return view('pages/oah');
	}
	

}
