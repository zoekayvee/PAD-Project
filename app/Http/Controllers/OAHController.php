<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class OAHController extends Controller {

	//
	public function showOAH() {
		return view('pages/oah');
	}

}
