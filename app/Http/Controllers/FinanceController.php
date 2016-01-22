<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;

class FinanceController extends Controller {

	public function getUtang() {
		$user = \Auth::user();
		$users = User::oldest('lname')->get();
		return view('pages/finance', compact('user', 'users'));
	}

}
