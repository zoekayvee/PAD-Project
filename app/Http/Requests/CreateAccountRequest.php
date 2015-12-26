<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateAccountRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'fname' => 'required',
			'lname' => 'required',
			'username' => 'required',
			'email' => 'required',
			'password' => 'required',
			'studno' => 'required|min:10',
			'department' => 'required',
			'batch' => 'required',
		];
	}

}
