<?php namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\CreateUserRequest;
use App\User;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

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

		$this->middleware('guest', ['except' => 'getLogout']);
//		$this->middleware('guest', ['except' => 'getSino']);
	}
	
    public function getShow()
    {
//		$this->auth->logout();
	
//		return \Auth::user();
        $users = User::all();
        return view('pages/user', compact('users'));
    }

	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required',
		]);

		//contains email and password from login form
		$credentials = $request->only('email', 'password');

		//retrieve user with same email
		$user = User::where('email', $credentials['email'])->get();
		
		//check password if it exists
		if($user != '[]') {
			$user = $user[0];
			if($user['password'] == $credentials['password']) {
				$this->auth->login($user);
				return redirect('/profile');			
			}
		}

		return redirect($this->loginPath())
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'email' => $this->getFailedLoginMessage(),
					]);
	}

	public function getSino()
	{
		return \Auth::user();		
	}

	public function getLogout()
	{
		$this->auth->logout();
		return redirect('/');
	}

	public function loginPath()
	{
		return property_exists($this, 'loginPath') ? $this->loginPath : '/account/login';
	}

}
