<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;
use App\Event;
use App\Committee;
use App\Head;
use App\Member;
use App\Task;
use App\FinancialStatus;

class AdminController extends Controller {

	//middleware to prevent guest to access sub routes
	public function __construct()
	{
		$this->middleware('admin');
	}

	private function currentEvent() {
        return Event::latest('id')->first();
	}

	public function getIndex() {
		$user = \Auth::user();
		$pendings = User::where('standing','unconfirmed')->get();
		$event = $this->currentEvent();
		$committee = Committee::where('event_id',$event->id)->get();
		$committees = Committee::all();
		$heads = Head::all();
		$users = User::all();
		$events = Event::all();
		$tasks = Task::all();
		return view('admin/admin', compact('user','users','pendings','events', 'event','heads','committee','committees','tasks'));
	}

	public function postEvaluate(Request $request) {
		$data = $request->all();
		$user_id = $data['user_id'];
		$evaluation = $data['evaluation'];

		$user = User::where("id", $user_id)->first();
		$event = $this->currentEvent();
		
		if($evaluation == "false") {			
			$user->delete();
		}


		else {
			$user->standing = "active";
			$user->save();
	
			$position = $data['position'];

			if($position == "Overall Activity Head") {
				$event->oah_id = $user_id;
				$event->save();
			}


			elseif($position == "Committee Head") {
				$comm_id = $data['comm_id'];
				$comm = Committee::where("event_id", $event->id)->where("id", $comm_id)->first();
				$head = new Head();
				$head->position = $comm->name . " Head";
				$head->user_id = $user_id;
				$head->comm_id = $comm->id;
				$head->event_id = $event->id;
				$head->save();
			}

			else {
				$member = new Member();
				$member->user_id = $user_id;
				$member->comm_id = $comm_id;
				$member->save();
			}
		}

		return redirect('/admin');
	}

	public function getData() {
        $users = User::all();
        $events = Event::all();
        $committees = Committee::all();
        $heads = Head::all();
        return view('admin/data', compact('users', 'events', 'committees', 'heads'));
	}

	public function postEvent(Request $request) {
		$event = $request->all();
		$event['weight'] = 0;

		$finance = FinancialStatus::all();
		foreach($finance as $fin)
			$fin->delete();

		Event::create($event);
		return redirect('/admin');
	}

	public function postCommittee(Request $request) {
		$committee = $request->all();
		$committee['weight'] = 0;
		Committee::create($committee);
		return redirect('/admin');
	}

	public function postHead(Request $request) {
		$head = $request->all();
		Head::create($head);
		return redirect('/admin');
	}

}
