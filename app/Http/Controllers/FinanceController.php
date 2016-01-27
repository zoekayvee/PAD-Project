<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use App\Head;
use App\Event;

class FinanceController extends Controller {

	public function getBalance() {
		$user = \Auth::user();

		$curr_event = Event::latest('id')->first();
		$is_head = Head::where('event_id', $curr_event->id)->where('user_id', $user->id)->first();
		if($is_head->position == "Finance Committee Head") $is_head = true;
		else $is_head = false;

		if (!$is_head) return redirect("/");

		$users = User::where('standing', 'active')->oldest('lname')->get();
		return view('pages/finance', compact('user', 'users'));
	}

	public function postBalance(Request $request, $id) {
		$data = $request->all();
		$user = User::where('id', $id)->first();
		$user->debt = $data['value'];
		$user->save();

		$user = \Auth::user();
		$users = User::where('standing', 'active')->oldest('lname')->get();
		return view('pages/finance', compact('user', 'users'));
	}

}
