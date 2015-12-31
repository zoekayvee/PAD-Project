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
/*		$event = Event::latest('created_at')->first();
		$oah = User::find($event['oah_id']);
		$committee = Committee::all();
		return $committee;
		return $oah;

		return \Auth::user();
*/		return view('pages/index');
	}


}


