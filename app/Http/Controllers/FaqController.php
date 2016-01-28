<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FaqController extends Controller {

	//loads faq
	public function getIndex() {
		$user = \Auth::user();
		return view('pages/faq', compact('user'));
	}
}