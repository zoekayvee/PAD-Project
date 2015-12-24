<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProfileController extends Controller {

	//
	public function showCommittee() {
		return view('pages/profile');
	}

	public function showHeads() {
		return view('pages/heads');
	}

	public function showOAH() {
		return view('pages/oah');
	}
	

}
