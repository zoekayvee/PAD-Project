<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\Committee;
use App\Head;
use App\EventShout;
use App\FinancialStatus;
use App\Task;

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
		$comm_name = Committee::where('event_id', $event->id)->get();
		$comm_progress = Committee::where('event_id', $event->id)->get(array('progress'))->toArray();

		if($user->standing == 'unconfirmed') {
			return view('pages/oops', compact('user'));
		}

		$fin_status = FinancialStatus::latest('created_at')->first();
		$tasks = Task::where('assigned_to', $user->id)->where('event_id', $event->id)->latest('deadline')->get();

		if($user == "") return view('auth/login');

		$shouts = EventShout::where('event_id', $event->id)->latest('created_at')->get();
		$heads = Head::where("event_id", $event->id)->get();

		return view('pages/home', compact('user', 'event','shouts','heads', 'fin_status', 'tasks', 'comm_name', 'comm_progress'));
	}

	public function postAnnouncement(Request $request) {
		$data = $request->all();
		EventShout::create($data);
		return redirect("/");
	}

	public function postFinancialStatus(Request $request) {
		$data = $request->all();
		
		$latest = FinancialStatus::latest('created_at')->first();
		$event_id = Event::latest('id')->first()->id;		
		$head_id = Head::where('event_id', $event_id)->where('position', 'Finance Committee Head')->first()->id;

		$data['weekly_income'] = $data['cash_in'] - $data['cash_out'];
		$data['cash_in_hand'] = $latest->cash_in_hand + $data['weekly_income'];
		$data['target_budget'] = $latest['target_budget'];
		$data['event_id'] = $event_id;
		$data['head_id'] = $head_id;

		FinancialStatus::create($data);
		return redirect("/");
	}

	public function getOops() {
		$user = \Auth::user();		
		return view('pages/oops', compact('user'));
	}


}


