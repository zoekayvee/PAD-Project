<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller {

	public function getUser() {
		$user = \Auth::user();
		if(\Auth::guest()) {
			$user['username'] = "gellopogi";
			$user['lname'] = "Guiam";
			$user['mname'] = "Capa";
			$user['fname'] = "Angelo";
			$user['studno'] = "2013-04596";
			$user['department'] = "PAD";
			$user['batch'] = "blendeD";
		}
		return $user;
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
