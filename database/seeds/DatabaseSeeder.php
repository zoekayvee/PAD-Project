<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Event;
use App\Committee;
use App\Head;
use App\Member;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('DatabaseResetter');
	}


}

class DatabaseResetter extends Seeder {

	public function run()
	{
		DB::table('members')->delete();
		DB::table('heads')->delete();
		DB::table('committees')->delete();
		DB::table('events')->delete();
		DB::table('users')->delete();

		$this->call('UsersTableSeeder');
	}
}

class UsersTableSeeder extends Seeder
{
	public function run()
	{
		User::create([
		'id' => '1',
		'fname' => "YSES",
		'mname' => "Tracker",
		'lname' => "Admin",
		'username' => "ysestrackeradmin",
		'email' => "admin@ysestracker.dev",
		'password' => "password",
		'studno' => "XXXX-XXXXX",
		'department' => "Projects and Activities",
		'batch' => "blendeD",
		'standing' => "admin",
		]);

		User::create([
		'id' => '2',
		'fname' => "Charlie",
		'mname' => "Santiago",
		'lname' => "Puth",
		'username' => "heyitsmecharlie",
		'email' => "charlie@yses.org",
		'password' => "password",
		'studno' => "2011-00000",
		'department' => "Secretariat",
		'batch' => "Marvin Gaye",
		'standing' => "active",
		]);

		User::create([
		'id' => '3',
		'fname' => "Celyn",
		'mname' => "Middle",
		'lname' => "Zarraga",
		'username' => "celynzarraga",
		'email' => "celyne@yses.org",
		'password' => "password",
		'studno' => "2013-00000",
		'department' => "Visuals and Logistics",
		'batch' => "RAMpage",
		'standing' => "active",
		]);

		User::create([
		'id' => '4',
		'fname' => "Almer",
		'mname' => "Middle",
		'lname' => "Mendoza",
		'username' => "almermendoza",
		'email' => "almer@yses.org",
		'password' => "password",
		'studno' => "2013-11111",
		'department' => "Projects and Activities",
		'batch' => "RAMpage",
		'standing' => "active",
		]);

		User::create([
		'id' => '5',
		'fname' => "Angelo",
		'mname' => "Capa",
		'lname' => "Guiam",
		'username' => "gelloguiam",
		'email' => "acguiam@yses.org",
		'password' => "password",
		'studno' => "2013-04596",
		'department' => "Projects and Activities",
		'batch' => "blendeD",
		'standing' => "active",
		]);

		User::create([
		'id' => '6',
		'fname' => "Magi Joy",
		'mname' => "Santos",
		'lname' => "Larin",
		'username' => "magijoy",
		'email' => "mjslarin@yses.org",
		'password' => "password",
		'studno' => "2013-56443",
		'department' => "Projects and Activities",
		'batch' => "blendeD",
		'standing' => "active",
		]);

		User::create([
		'id' => '7',
		'fname' => "Claizel Coubeili",
		'mname' => "Llagas",
		'lname' => "Cepe",
		'username' => "queenbeili",
		'email' => "cccepe@yses.org",
		'password' => "password",
		'studno' => "2014-65245",
		'department' => "Projects and Activities",
		'batch' => "blendeD",
		'standing' => "active",
		]);

		User::create([
		'id' => '8',
		'fname' => "Zoe Kristen",
		'mname' => "Middle",
		'lname' => "Villanueva",
		'username' => "zoekristen",
		'email' => "zktvillanueva@yses.org",
		'password' => "password",
		'studno' => "2014-04599",
		'department' => "Projects and Activities",
		'batch' => "blendeD",
		'standing' => "active",
		]);

		User::create([
		'id' => '9',
		'fname' => "Alden",
		'mname' => "Middle",
		'lname' => "Richards",
		'username' => "aldenngbuhaymo",
		'email' => "alden@yses.org",
		'password' => "password",
		'studno' => "2014-04591",
		'department' => "Projects and Activities",
		'batch' => "blendeD",
		'standing' => "unconfirmed",
		]);

		User::create([
		'id' => '10',
		'fname' => "Maine",
		'mname' => "Middle",
		'lname' => "Mendoza",
		'username' => "yayadub",
		'email' => "maine@yses.org",
		'password' => "password",
		'studno' => "2014-04592",
		'department' => "Projects and Activities",
		'batch' => "blendeD",
		'standing' => "unconfirmed",
		]);

		$this->call('EventsTableSeeder');

	}
}

class EventsTableSeeder extends Seeder
{

	public function run() {
		Event::create([
			'id' => '1',
			'title' => 'PFJF',
			'theme' => 'CTRL + Shift',
			'sem' => 'Second Semester',
			'year' => '2014-2015',
			'oah_id' => User::where('fname', 'Almer')->first()->id,
			'weight' => '0',
		]);

		Event::create([
			'id' => '2',
			'title' => 'GET 1/4',
			'theme' => 'Overclocked',
			'sem' => 'First Semester',
			'year' => '2015-2016',
			'oah_id' => User::where('fname', 'Celyn')->first()->id,
			'weight' => '0',
		]);

		Event::create([
			'id' => '3',
			'title' => 'PFJF',
			'theme' => 'Decode Your Future',
			'sem' => 'Second Semester',
			'year' => '2015-2016',
			'oah_id' => User::where('fname', 'Charlie')->first()->id,
			'weight' => '0',
		]);

		$this->call('CommitteeTableSeeder');

	}
}

class CommitteeTableSeeder extends Seeder
{

	public function run()
	{
		Committee::create([
			'id' => '1',
			'name' => 'Programs Committee',
			'weight' => '0',
			'event_id' => '2',
		]);

		Committee::create([
			'id' => '2',
			'name' => 'Technical Committee',
			'weight' => '0',
			'event_id' => '2',
		]);

		Committee::create([
			'id' => '3',
			'name' => 'Visuals Committee',
			'weight' => '0',
			'event_id' => '2',
		]);

		Committee::create([
			'id' => '4',
			'name' => 'Visuals Committee',
			'weight' => '0',
			'event_id' => '3',
		]);

		Committee::create([
			'id' => '5',
			'name' => 'Promotions Committee',
			'weight' => '0',
			'event_id' => '3',
		]);
		
		Committee::create([
			'id' => '6',
			'name' => 'Secretariat Committee',
			'weight' => '0',
			'event_id' => '3',
		]);
		
		Committee::create([
			'id' => '7',
			'name' => 'Finance Committee',
			'weight' => '0',
			'event_id' => '3',
		]);

		$this->call('HeadTableSeeder');

	}
}

class HeadTableSeeder extends Seeder
{
	public function run()
	{
		Head::create([
			'id' => '1',
			'position' => Committee::where('id', '1')->first()->name . " Head",
			'user_id' => User::where('lname', 'Larin')->first()->id,
			'comm_id' => '1',
			'event_id' => Committee::where('id', '1')->first()->event_id,
		]);

		Head::create([
			'id' => '2',
			'position' => Committee::where('id', '2')->first()->name . " Head",
			'user_id' => User::where('lname', 'Cepe')->first()->id,
			'comm_id' => '2',
			'event_id' => Committee::where('id', '2')->first()->event_id,
		]);

		Head::create([
			'id' => '3',
			'position' => Committee::where('id', '4')->first()->name . " Head",
			'user_id' => User::where('lname', 'Guiam')->first()->id,
			'comm_id' => '4',
			'event_id' => Committee::where('id', '4')->first()->event_id,
		]);

		Head::create([
			'id' => '4',
			'position' => Committee::where('id', '5')->first()->name . " Head",
			'user_id' => User::where('lname', 'Larin')->first()->id,
			'comm_id' => '5',
			'event_id' => Committee::where('id', '5')->first()->event_id,
		]);

		Head::create([
			'id' => '5',
			'position' => Committee::where('id', '6')->first()->name . " Head",
			'user_id' => User::where('lname', 'Cepe')->first()->id,
			'comm_id' => '6',
			'event_id' => Committee::where('id', '6')->first()->event_id,
		]);

		Head::create([
			'id' => '6',
			'position' => Committee::where('id', '7')->first()->name . " Head",
			'user_id' => User::where('lname', 'Villanueva')->first()->id,
			'comm_id' => '7',
			'event_id' => Committee::where('id', '7')->first()->event_id,
		]);

		$this->call('MembersTableSeeder');

	}
}

class MembersTableSeeder extends Seeder
{
	public function run()
	{

		Member::create([
			'id' => '1',
			'user_id' => User::where('lname', 'Guiam')->first()->id,
			'comm_id' => '3',
		]);

		Member::create([
			'id' => '2',
			'user_id' => User::where('lname', 'Villanueva')->first()->id,
			'comm_id' => '3',
		]);

		Member::create([
			'id' => '3',
			'user_id' => User::where('lname', 'Puth')->first()->id,
			'comm_id' => '3',
		]);

		Member::create([
			'id' => '4',
			'user_id' => User::where('lname', 'Puth')->first()->id,
			'comm_id' => '4',
		]);

		Member::create([
			'id' => '5',
			'user_id' => User::where('lname', 'Zarraga')->first()->id,
			'comm_id' => '4',
		]);

		Member::create([
			'id' => '6',
			'user_id' => User::where('lname', 'Puth')->first()->id,
			'comm_id' => '5',
		]);

		Member::create([
			'id' => '7',
			'user_id' => User::where('lname', 'Zarraga')->first()->id,
			'comm_id' => '5',
		]);

		Member::create([
			'id' => '8',
			'user_id' => User::where('lname', 'Puth')->first()->id,
			'comm_id' => '6',
		]);

		Member::create([
			'id' => '9',
			'user_id' => User::where('lname', 'Zarraga')->first()->id,
			'comm_id' => '6',
		]);

		Member::create([
			'id' => '10',
			'user_id' => User::where('lname', 'Puth')->first()->id,
			'comm_id' => '7',
		]);

		Member::create([
			'id' => '11',
			'user_id' => User::where('lname', 'Zarraga')->first()->id,
			'comm_id' => '7',
		]);

		Member::create([
			'id' => '12',
			'user_id' => User::where('lname', 'Cepe')->first()->id,
			'comm_id' => '1',
		]);

		Member::create([
			'id' => '13',
			'user_id' => User::where('lname', 'Cepe')->first()->id,
			'comm_id' => '2',
		]);

		Member::create([
			'id' => '14',
			'user_id' => User::where('lname', 'Larin')->first()->id,
			'comm_id' => '3',
		]);

	}
}