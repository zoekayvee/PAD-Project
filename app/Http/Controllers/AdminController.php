<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;
use App\Event;
use App\Committee;
use App\Head;

class AdminController extends Controller {

	function getData() {
        $users = User::all();
        $events = Event::all();
        $committees = Committee::all();
        $heads = Head::all();
        $event = Event::latest('created_at')->first();
//        return $event['oah'];
        return view('admin/data', compact('users', 'events', 'committees', 'heads'));
	}

	function getEvent() {
        $users = User::all();
		return view('admin/event', compact('users'));
	}

	function postEvent(Request $request) {
		$event = $request->all();
		$event['weight'] = 0;
		Event::create($event);
		return redirect('admin/data');
	}

	function getCommittee() {
        $events = Event::all();
		return view('admin/committee', compact('events'));
	}

	function postCommittee(Request $request) {
		$committee = $request->all();
		$committee['weight'] = 0;
		Committee::create($committee);
		return redirect('admin/data');
	}

	function getHead() {
		$committees = Committee::all();
		$users = User::all();
		$events = Event::all();
		return view('admin/head', compact('events', 'users', 'committees'));
	}

	function postHead(Request $request) {
		$head = $request->all();
		Head::create($head);
		return redirect('admin/data');
	}

}
