<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;

class FinanceController extends Controller {

	public function getBalance() {
		$user = \Auth::user();
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
