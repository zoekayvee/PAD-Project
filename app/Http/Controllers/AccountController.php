<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;

use Request;
use App\Http\Controllers\Auth\ManagesAccounts;

class AccountController extends Controller {

	use ManagesAccounts;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */

	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

//		$this->middleware('guest', ['except' => 'getLogout']);
	}


}