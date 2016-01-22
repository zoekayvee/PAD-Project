<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'fname' => 'required',
			'lname' => 'required',
			'username' => 'required',
			'email' => 'required',
			'password' => 'required',
			'studno' => 'required|min:10',
			'department' => 'required',
			'batch' => 'required',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'fname' => $data['fname'],
			'mname' => $data['mname'],
			'lname' => $data['lname'],
			'username' => $data['username'],
			'email' => $data['email'],
			'password' => $data['password'],
//			'password' => bcrypt($data['password']),
			'studno' => $data['studno'],
			'department' => $data['department'],
			'batch' => $data['batch'],
			'standing' => $data['standing'],
			'debt' => $data['debt'],
		]);

	}

}
