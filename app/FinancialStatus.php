<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialStatus extends Model {

	protected $table = 'financial_statuses';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['cash_in','cash_out','weekly_income','cash_in_hand','payables','target_budget', 'event_id', 'head_id'];

}
