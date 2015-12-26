<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller {

	//loads homepage
	public function index() {
//		return \Auth::user();
		return view('pages/index');
	}

}


