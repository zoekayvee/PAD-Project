<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\Committee;
use App\Head;
use App\EventShout;

class HomeController extends Controller {

	//middleware to prevent guest to access sub routes
	public function __construct()
	{
		$this->middleware('auth');
	}	

	//loads homepage
	public function getIndex() {
		$event = Event::latest('id')->first();
		$user = \Auth::user();

		if($user == "") return view('auth/login');

		$shouts = EventShout::where('event_id', $event->id)->latest('created_at')->get();
		$heads = Head::where("event_id", $event->id)->get();
		return view('pages/home', compact('user', 'event','shouts','heads'));
	}

	public function postIndex(Request $request) {
		$data = $request->all();
		EventShout::create($data);
		return redirect("/");
	}



}


