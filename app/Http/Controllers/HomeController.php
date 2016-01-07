<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\Committee;

class HomeController extends Controller {

	//loads homepage
	public function index() {
		$event = Event::latest('created_at')->first();
		$user = \Auth::user();
		if($user == "") return view('auth/login');
		return view('pages/home', compact('user', 'event'));
	}



}


