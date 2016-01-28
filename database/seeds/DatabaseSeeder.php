<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Event;
use App\Committee;
use App\Head;
use App\Member;
use App\FinancialStatus;
use App\EventShout;

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
		DB::table('event_shouts')->delete();
		DB::table('financial_statuses')->delete();
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
		'debt' => '0',
		]);

		User::create([
		'id' => '2',
		'fname' => "Celyne",
		'mname' => "Middle",
		'lname' => "Zarraga",
		'username' => "celynezarraga",
		'email' => "zarraga@yses.org",
		'password' => "password",
		'studno' => "2013-00002",
		'department' => "Visuals and Logistics Department",
		'batch' => "RAMpage",
		'standing' => "active",
		'debt' => '0',
		]);

		User::create([
		'id' => '3',
		'fname' => "Marieflor",
		'mname' => "Middle",
		'lname' => "Bawanan",
		'username' => "marieflor",
		'email' => "bawanan@yses.org",
		'password' => "password",
		'studno' => "2012-00003",
		'department' => "Scholastics Department",
		'batch' => "RAMpage",
		'standing' => "active",
		'debt' => '0',
		]);

		User::create([
		'id' => '4',
		'fname' => "Joseph Matthew",
		'mname' => "Middle",
		'lname' => "Marcos",
		'username' => "josephmatthew",
		'email' => "marcos@yses.org",
		'password' => "password",
		'studno' => "2013-00004",
		'department' => "Projects and Activities Department",
		'batch' => "RAMpage",
		'standing' => "unconfirmed",
		'debt' => '0',
		]);

		User::create([
		'id' => '5',
		'fname' => "Luis",
		'mname' => "Middle",
		'lname' => "Pastores",
		'username' => "iamlouie",
		'email' => "pastores@yses.org",
		'password' => "password",
		'studno' => "2012-00005",
		'department' => "Human Resources Department",
		'batch' => "RAMpage",
		'standing' => "active",
		'debt' => '0',
		]);

		User::create([
		'id' => '6',
		'fname' => "Angelica",
		'mname' => "Middle",
		'lname' => "Ware",
		'username' => "geecaware",
		'email' => "ware@yses.org",
		'password' => "password",
		'studno' => "2013-00006",
		'department' => "Secretariat Department",
		'batch' => "Prautes Canonical",
		'standing' => "active",
		'debt' => '0',
		]);

		User::create([
		'id' => '7',
		'fname' => "Peter Bernard",
		'mname' => "Middle",
		'lname' => "Rupa",
		'username' => "peterpogi",
		'email' => "rupa@yses.org",
		'password' => "password",
		'studno' => "2013-00007",
		'department' => "Projects and Activities Department",
		'batch' => "RAMpage",
		'standing' => "active",
		'debt' => '0',
		]);

		User::create([
		'id' => '8',
		'fname' => "Almer",
		'mname' => "Middle",
		'lname' => "Mendoza",
		'username' => "mamer",
		'email' => "mendoza@yses.org",
		'password' => "password",
		'studno' => "2013-00008",
		'department' => "Projects and Activities Department",
		'batch' => "RAMpage",
		'standing' => "active",
		'debt' => '0',
		]);

		User::create([
		'id' => '9',
		'fname' => "Perfeli Adrian",
		'mname' => "Middle",
		'lname' => "Clemente",
		'username' => "perfs",
		'email' => "clemente@yses.org",
		'password' => "password",
		'studno' => "2013-00009",
		'department' => "Visuals and Logistics Department",
		'batch' => "Prautes Canonical",
		'standing' => "active",
		'debt' => '0',
		]);

		User::create([
		'id' => '10',
		'fname' => "Narom",
		'mname' => "Middle",
		'lname' => "Santos",
		'username' => "fabnarom",
		'email' => "santos@yses.org",
		'password' => "password",
		'studno' => "2013-00010",
		'department' => "Projects and Activities Department",
		'batch' => "Praues Canonical",
		'standing' => "active",
		'debt' => '0',
		]);

		User::create([
		'id' => '11',
		'fname' => "Mike",
		'mname' => "Middle",
		'lname' => "Serato",
		'username' => "mikemikemike",
		'email' => "serato@yses.org",
		'password' => "password",
		'studno' => "2013-00011",
		'department' => "Human Resources Department",
		'batch' => "Praues Canonical",
		'standing' => "active",
		'debt' => '0',
		]);

		User::create([
		'id' => '12',
		'fname' => "Anne Kristine",
		'mname' => "Middle",
		'lname' => "Montoya",
		'username' => "kristineganda",
		'email' => "montoyta@yses.org",
		'password' => "password",
		'studno' => "2013-00012",
		'department' => "Human Resources Department",
		'batch' => "RAMpage",
		'standing' => "unconfirmed",
		'debt' => '0',
		]);

		User::create([
		'id' => '13',
		'fname' => "Marianne Louise",
		'mname' => "Middle",
		'lname' => "Rivera",
		'username' => "ariarivera",
		'email' => "rivera@yses.org",
		'password' => "password",
		'studno' => "2013-00013",
		'department' => "Finance Department",
		'batch' => "Praues Canonical",
		'standing' => "active",
		'debt' => '0',
		]);

		User::create([
		'id' => '14',
		'fname' => "Jeriel",
		'mname' => "Gonzales",
		'lname' => "Jaro",
		'username' => "jejejaro",
		'email' => "jaro@yses.org",
		'password' => "password",
		'studno' => "2013-00014",
		'department' => "Projects and Activities Department",
		'batch' => "blendeD",
		'standing' => "active",
		'debt' => '0',
		]);

		User::create([
		'id' => '15',
		'fname' => "Mon Cedrick",
		'mname' => "Middle",
		'lname' => "Frias",
		'username' => "moncedrick",
		'email' => "frias@yses.org",
		'password' => "password",
		'studno' => "2013-00015",
		'department' => "Human Resources Department",
		'batch' => "RAMpage",
		'standing' => "active",
		'debt' => '0',
		]);

		User::create([
		'id' => '16',
		'fname' => "Danielika",
		'mname' => "Middle",
		'lname' => "Macusi",
		'username' => "lykaboss",
		'email' => "macusi@yses.org",
		'password' => "password",
		'studno' => "2013-00016",
		'department' => "Projects and Activities Department",
		'batch' => "blendeD",
		'standing' => "active",
		'debt' => '0',
		]);

		User::create([
		'id' => '17',
		'fname' => "Angelo",
		'mname' => "Capa",
		'lname' => "Guiam",
		'username' => "gelloguiam",
		'email' => "guiam@yses.org",
		'password' => "password",
		'studno' => "2013-04596",
		'department' => "Projects and Activities Department",
		'batch' => "blendeD",
		'standing' => "active",
		'debt' => '0',
		]);

		User::create([
		'id' => '18',
		'fname' => "Magi Joy",
		'mname' => "Soriano",
		'lname' => "Larin",
		'username' => "magijoy",
		'email' => "larin@yses.org",
		'password' => "password",
		'studno' => "2013-56443",
		'department' => "Projects and Activities Department",
		'batch' => "blendeD",
		'standing' => "active",
		'debt' => '0',
		]);

		User::create([
		'id' => '19',
		'fname' => "Anna-Mae Caitlin",
		'mname' => "Arlegui",
		'lname' => "Fernandez",
		'username' => "mazerunner",
		'email' => "fernandez@yses.org",
		'password' => "password",
		'studno' => "2014-00019",
		'department' => "Projects and Activities Department",
		'batch' => "blendeD",
		'standing' => "active",
		'debt' => '0',
		]);

		User::create([
		'id' => '20',
		'fname' => "Leanne",
		'mname' => "Middle",
		'lname' => "Caymo",
		'username' => "leannecaymo",
		'email' => "caymo@yses.org",
		'password' => "password",
		'studno' => "2014-00020",
		'department' => "Projects and Activities Department",
		'batch' => "blendeD",
		'standing' => "active",
		'debt' => '0',
		]);

		User::create([
		'id' => '21',
		'fname' => "Claizel Coubeili",
		'mname' => "Llagas",
		'lname' => "Cepe",
		'username' => "queenbeili",
		'email' => "cepe@yses.org",
		'password' => "password",
		'studno' => "2014-65245",
		'department' => "Projects and Activities Department",
		'batch' => "blendeD",
		'standing' => "active",
		'debt' => '0',
		]);


		User::create([
		'id' => '22',
		'fname' => "Samuel Tadeo",
		'mname' => "Linco",
		'lname' => "Bautista",
		'username' => "samthegreat",
		'email' => "bautista@yses.org",
		'password' => "password",
		'studno' => "2014-00022",
		'department' => "Projects and Activities Department",
		'batch' => "blendeD",
		'standing' => "active",
		'debt' => '0',
		]);


		User::create([
		'id' => '23',
		'fname' => "Lyka",
		'mname' => "Middle",
		'lname' => "Macaraig",
		'username' => "lykalyka",
		'email' => "macaraig@yses.org",
		'password' => "password",
		'studno' => "2014-00023",
		'department' => "Projects and Activities Department",
		'batch' => "blendeD",
		'standing' => "active",
		'debt' => '0',
		]);

		User::create([
		'id' => '24',
		'fname' => "Naomi Joy",
		'mname' => "Soriano",
		'lname' => "Sibal",
		'username' => "naomisibal",
		'email' => "sibal@yses.org",
		'password' => "password",
		'studno' => "2013-00024",
		'department' => "Projects and Activities Department",
		'batch' => "blendeD",
		'standing' => "active",
		'debt' => '0',
		]);

		User::create([
		'id' => '25',
		'fname' => "Zoe Kirsten",
		'mname' => "Taihitu",
		'lname' => "Villanueva",
		'username' => "zoekv",
		'email' => "villanueva@yses.org",
		'password' => "password",
		'studno' => "2014-46051",
		'department' => "Projects and Activities Department",
		'batch' => "blendeD",
		'standing' => "active",
		'debt' => '0',
		]);

		User::create([
		'id' => '26',
		'fname' => "Blessy",
		'mname' => "Middle",
		'lname' => "Silvania",
		'username' => "heyitsyssel",
		'email' => "silvania@yses.org",
		'password' => "password",
		'studno' => "2014-00026",
		'department' => "Projects and Activities Department",
		'batch' => "blendeD",
		'standing' => "active",
		'debt' => '0',
		]);

		User::create([
		'id' => '27',
		'fname' => "Emmy Jane",
		'mname' => "Middle",
		'lname' => "Cabarles",
		'username' => "emmycabarles",
		'email' => "cabarles@yses.org",
		'password' => "password",
		'studno' => "2014-00027",
		'department' => "Projects and Activities Department",
		'batch' => "blendeD",
		'standing' => "active",
		'debt' => '0',
		]);

		$this->call('EventsTableSeeder');

	}
}

class EventsTableSeeder extends Seeder
{

	public function run() {
		Event::create([
			'id' => '1',
			'title' => 'GET 1/4',
			'theme' => 'Overclocked',
			'sem' => 'First Semester',
			'year' => '2015 - 2016',
			'oah_id' => User::where('lname', 'Zarraga')->first()->id,
			'weight' => '0',
		]);

		Event::create([
			'id' => '2',
			'title' => 'PFJF',
			'theme' => 'Decode Your Future',
			'sem' => 'Second Semester',
			'year' => '2015 - 2016',
			'oah_id' => User::where('lname', 'Mendoza')->first()->id,
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
			'name' => 'Finance Committee',
			'weight' => '0',
			'event_id' => '1',
		]);

		Committee::create([
			'id' => '2',
			'name' => 'Programs Committee',
			'weight' => '0',
			'event_id' => '1',
		]);

		Committee::create([
			'id' => '3',
			'name' => 'Technical Committee',
			'weight' => '0',
			'event_id' => '1',
		]);

		Committee::create([
			'id' => '4',
			'name' => 'Visuals Committee',
			'weight' => '0',
			'event_id' => '1',
		]);

		Committee::create([
			'id' => '5',
			'name' => 'Promotions Committee',
			'weight' => '0',
			'event_id' => '1',
		]);
		
		Committee::create([
			'id' => '6',
			'name' => 'Secretariat Committee',
			'weight' => '0',
			'event_id' => '1',
		]);
		
		Committee::create([
			'id' => '7',
			'name' => 'Finance Committee',
			'weight' => '0',
			'event_id' => '2',
		]);

		Committee::create([
			'id' => '8',
			'name' => 'Programs Committee',
			'weight' => '0',
			'event_id' => '2',
		]);

		Committee::create([
			'id' => '9',
			'name' => 'Technical Committee',
			'weight' => '0',
			'event_id' => '2',
		]);

		Committee::create([
			'id' => '10',
			'name' => 'Visuals Committee',
			'weight' => '0',
			'event_id' => '2',
		]);

		Committee::create([
			'id' => '11',
			'name' => 'Promotions Committee',
			'weight' => '0',
			'event_id' => '2',
		]);
		
		Committee::create([
			'id' => '12',
			'name' => 'Secretariat Committee',
			'weight' => '0',
			'event_id' => '2',
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
			'user_id' => User::where('lname', 'Pastores')->first()->id,
			'comm_id' => '1',
			'event_id' => Committee::where('id', '1')->first()->event_id,
		]);

		Head::create([
			'id' => '2',
			'position' => Committee::where('id', '2')->first()->name . " Head",
			'user_id' => User::where('lname', 'Rupa')->first()->id,
			'comm_id' => '2',
			'event_id' => Committee::where('id', '2')->first()->event_id,
		]);

		Head::create([
			'id' => '3',
			'position' => Committee::where('id', '2')->first()->name . " Head",
			'user_id' => User::where('lname', 'Mendoza')->first()->id,
			'comm_id' => '2',
			'event_id' => Committee::where('id', '2')->first()->event_id,
		]);

		Head::create([
			'id' => '4',
			'position' => Committee::where('id', '3')->first()->name . " Head",
			'user_id' => User::where('lname', 'Clemente')->first()->id,
			'comm_id' => '3',
			'event_id' => Committee::where('id', '3')->first()->event_id,
		]);

		Head::create([
			'id' => '5',
			'position' => Committee::where('id', '4')->first()->name . " Head",
			'user_id' => User::where('lname', 'Santos')->first()->id,
			'comm_id' => '4',
			'event_id' => Committee::where('id', '4')->first()->event_id,
		]);

		Head::create([
			'id' => '6',
			'position' => Committee::where('id', '5')->first()->name . " Head",
			'user_id' => User::where('lname', 'Serato')->first()->id,
			'comm_id' => '5',
			'event_id' => Committee::where('id', '5')->first()->event_id,
		]);

		Head::create([
			'id' => '7',
			'position' => Committee::where('id', '6')->first()->name . " Head",
			'user_id' => User::where('lname', 'Ware')->first()->id,
			'comm_id' => '6',
			'event_id' => Committee::where('id', '6')->first()->event_id,
		]);

		Head::create([
			'id' => '8',
			'position' => Committee::where('id', '7')->first()->name . " Head",
			'user_id' => User::where('lname', 'Rivera')->first()->id,
			'comm_id' => '7',
			'event_id' => Committee::where('id', '7')->first()->event_id,
		]);

		Head::create([
			'id' => '9',
			'position' => Committee::where('id', '8')->first()->name . " Head",
			'user_id' => User::where('lname', 'Frias')->first()->id,
			'comm_id' => '8',
			'event_id' => Committee::where('id', '8')->first()->event_id,
		]);

		Head::create([
			'id' => '10',
			'position' => Committee::where('id', '9')->first()->name . " Head",
			'user_id' => User::where('lname', 'Macusi')->first()->id,
			'comm_id' => '9',
			'event_id' => Committee::where('id', '9')->first()->event_id,
		]);

		Head::create([
			'id' => '11',
			'position' => Committee::where('id', '10')->first()->name . " Head",
			'user_id' => User::where('lname', 'Guiam')->first()->id,
			'comm_id' => '10',
			'event_id' => Committee::where('id', '10')->first()->event_id,
		]);

		Head::create([
			'id' => '12',
			'position' => Committee::where('id', '11')->first()->name . " Head",
			'user_id' => User::where('lname', 'Larin')->first()->id,
			'comm_id' => '11',
			'event_id' => Committee::where('id', '11')->first()->event_id,
		]);

		Head::create([
			'id' => '13',
			'position' => Committee::where('id', '11')->first()->name . " Head",
			'user_id' => User::where('lname', 'Santos')->first()->id,
			'comm_id' => '11',
			'event_id' => Committee::where('id', '11')->first()->event_id,
		]);

		Head::create([
			'id' => '14',
			'position' => Committee::where('id', '12')->first()->name . " Head",
			'user_id' => User::where('lname', 'Jaro')->first()->id,
			'comm_id' => '12',
			'event_id' => Committee::where('id', '12')->first()->event_id,
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
			'user_id' => User::where('lname', 'Macaraig')->first()->id,
			'comm_id' => '7',
			'event_id' => Committee::where('id', '7')->first()->event_id,
		]);

		Member::create([
			'id' => '2',
			'user_id' => User::where('lname', 'Fernandez')->first()->id,
			'comm_id' => '8',
			'event_id' => Committee::where('id', '8')->first()->event_id,
		]);

		Member::create([
			'id' => '3',
			'user_id' => User::where('lname', 'Cabarles')->first()->id,
			'comm_id' => '8',
			'event_id' => Committee::where('id', '8')->first()->event_id,
		]);

		Member::create([
			'id' => '4',
			'user_id' => User::where('lname', 'Bautista')->first()->id,
			'comm_id' => '9',
			'event_id' => Committee::where('id', '9')->first()->event_id,
		]);

		Member::create([
			'id' => '5',
			'user_id' => User::where('lname', 'Silvania')->first()->id,
			'comm_id' => '10',
			'event_id' => Committee::where('id', '10')->first()->event_id,
		]);		

		Member::create([
			'id' => '6',
			'user_id' => User::where('lname', 'Cepe')->first()->id,
			'comm_id' => '11',
			'event_id' => Committee::where('id', '11')->first()->event_id,
		]);

		Member::create([
			'id' => '7',
			'user_id' => User::where('lname', 'Bawanan')->first()->id,
			'comm_id' => '12',
			'event_id' => Committee::where('id', '12')->first()->event_id,
		]);

		Member::create([
			'id' => '8',
			'user_id' => User::where('lname', 'Clemente')->first()->id,
			'comm_id' => '12',
			'event_id' => Committee::where('id', '12')->first()->event_id,
		]);

		Member::create([
			'id' => '9',
			'user_id' => User::where('lname', 'Caymo')->first()->id,
			'comm_id' => '11',
			'event_id' => Committee::where('id', '11')->first()->event_id,
		]);

		Member::create([
			'id' => '10',
			'user_id' => User::where('lname', 'Sibal')->first()->id,
			'comm_id' => '10',
			'event_id' => Committee::where('id', '10')->first()->event_id,
		]);

		Member::create([
			'id' => '11',
			'user_id' => User::where('lname', 'Rupa')->first()->id,
			'comm_id' => '10',
			'event_id' => Committee::where('id', '10')->first()->event_id,
		]);

		Member::create([
			'id' => '12',
			'user_id' => User::where('lname', 'Pastores')->first()->id,
			'comm_id' => '10',
			'event_id' => Committee::where('id', '10')->first()->event_id,
		]);

		Member::create([
			'id' => '13',
			'user_id' => User::where('lname', 'Ware')->first()->id,
			'comm_id' => '12',
			'event_id' => Committee::where('id', '12')->first()->event_id,
		]);


		$this->call('FinancialStatusesTableSeeder');

	}
}

class FinancialStatusesTableSeeder extends Seeder
{
	public function run()
	{
		FinancialStatus::create([
			'id' => '1',
			'cash_in' => '2000',
			'cash_out' => '1500',
			'weekly_income' => '500',
			'payables' => '4900',
			'cash_in_hand' => '7543.50',
			'target_budget' => '23543.50',
			'event_id' => '2',
			'head_id' => Head::where('event_id', 2)->where('position', 'Finance Committee Head')->first()->id,
		]);

		$this->call('EventShoutsSeeder');

	}
}

class EventShoutsSeeder extends Seeder
{
	public function run()
	{
		EventShout::create([
			'id' => '1',
			'shout' => 'Bumoto sa VCOMM Poll',
			'event_id' => '2',
			'user_id' => '17',			
		]);
	}
}