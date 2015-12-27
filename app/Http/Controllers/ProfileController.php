<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller {

	public function getUser() {
		$user = \Auth::user();
		if($user == "") return "<h1>You are not signed in! Accomplish the registration. Link at <a href='/home'>localhost:8000</a></h1>";
		else return $user;
	}

	public function showCommittee() {
		$user = $this->getUser();
		return view('pages/profile', compact('user'));
	}

	public function showHeads() {
		$user = $this->getUser();
		return view('pages/heads', compact('user'));
	}

	public function showOAH() {
		$user = $this->getUser();
		return view('pages/oah', compact('user'));
	}
	

}
