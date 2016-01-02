<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Middleware\Authenticate;
use App\Committee;
use App\Event;
use App\User;
use App\Head;

class ProfileController extends Controller {

	//middleware to prevent guest to access sub routes
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getUser()
	{
		$user = \Auth::user();
		return $user;
	}


	public function getIndex()
	{
		$user = $this->getUser();
		$event = Event::latest('created_at')->first();
		$events = Event::all();
		$committes = Committee::where('event_id', $event['event_id']);
		
		//check if current user is OAH
		if($event['oah_id'] == $user['id']) return view('pages/oah', compact('user'));

		//check if current user is upper head
			//get current event id		
			$event_id = $event['event_id'];

			//get all heads of current event
			$heads = Head::where('event_id', $event_id)->where('user_id', $user['id'])->get();

			//return heads page if user is lower head
			if($heads != "[]") return view('pages/heads', compact('user'));


		return view('pages/profile', compact('user', 'events', 'committes'));
	}
	

}
