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
		$curr_event = Event::latest('id')->first();
		$committees = Committee::where('event_id', $curr_event->id);
		$events = Event::all();
		
		$url = "pages/profile";
		//check if curret user is admin
		if($user->id == 1) {
			return redirect('/admin/');
		}

		//check if current user is OAH
		if($curr_event->oah_id == $user->id) $url = "pages/oah";

		//check if current user is upper head
			//get current event id
			$curr_event_id = $curr_event->id;

			//get all heads of current event
			$heads = Head::where('event_id', $curr_event_id)->where('user_id', $user->id)->get();
			//return heads page if user is lower head
			if($heads != "[]") $url = "pages/heads";

		return view($url, compact('user', 'events', 'committees'));
	}
	

}
