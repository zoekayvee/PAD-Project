<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Committee;
use App\Event;
use App\Head;
use App\User;
use App\Member;


class DataController extends Controller {

	public function createAdmin() {
		$user = new User();
		$user->id = 1;
		$user->fname = "YSES";
		$user->mname = "Tracker";
		$user->lname = "Admin";
		$user->username = "ysestrackeradmin";
		$user->email = "admin@ysestracker.dev";
		$user->password = "password";
		$user->studno = "XXXX-XXXXX";
		$user->department = "Projects and Activities";
		$user->batch = "blendeD";
		$user->standing = "admin";
		$user->save();
	}

	public function createMember($id, $user_id, $comm_id) {
		$member = new Member();
		$member->id = $id;
		$member->user_id = $user_id;
		$member->comm_id = $comm_id;
		$member->save();
	}

	public function createUser($id, $fname, $mname, $lname, $username, $email, $password, $studno, $department, $batch, $standing) {
		$user = new User();
		$user->id = $id;
		$user->fname = $fname;
		$user->mname = $mname;
		$user->lname = $lname;
		$user->username = $username;
		$user->email = $email;
		$user->password = $password;
		$user->studno = $studno;
		$user->department = $department;
		$user->batch = $batch;
		$user->standing = $standing;
		$user->save();
	}

	public function createEvent($id, $title, $theme, $sem, $year, $oah_id, $weight) {
		$event = new Event();
		$event->id = $id;
		$event->title = $title;
		$event->theme = $theme;
		$event->sem = $sem;
		$event->year = $year;
		$event->oah_id = $oah_id;
		$event->weight = $weight;
		$event->save();
	}

	public function createCommittee($id,$name, $weight, $event_id) {
		$comm = new Committee();
		$comm->id = $id;
		$comm->name = $name;
		$comm->weight = $weight;
		$comm->event_id = $event_id;
		$comm->save();
	}

	public function createHead($id,$position, $user_id, $comm_id, $event_id) {
		$head = new Head();
		$head->id = $id;
		$head->position = $position;
		$head->user_id = $user_id;
		$head->comm_id = $comm_id;
		$head->event_id = $event_id;
		$head->save();
	}

	public function setData() {

		$det = Event::all();
		if($det == '[]') {

		$this->createAdmin();

		$this->createUser(2,"Kendall","Mendoza","Jener","kendalljener","user1@yses.com","password","2012-01928","Secretariat Department","rainByte","active");
		$this->createUser(3,"Celyne","Helloworld","Zerraga","heyimcelyne","user2@yses.com","password","2013-01921","Visuals and Logistics Department","RAMpage","active");
		$this->createUser(4,"Almer","Maine","Mendoza","almerfrompad","user3@yses.com","password","2013-01922","Projects and Activities Department","RAMpage","active");
		$this->createUser(5,"Angelo","Capa","Guiam","gelloguiam","acguiam@yses.com","password","2013-04596","Projects and Activities Department","blendeD","active");
		$this->createUser(6,"Magi Joy","Helloworld","Larin","magijoy","mjslarin@yses.com","password","2013-56443","Projects and Activities Department","blendeD","active");
		$this->createUser(7,"Claizel Coubeili","Helloworld","Cepe","beilicepe","cccepe@yses.com","password","2013-04598","Projects and Activities Department","blendeD","active");
		$this->createUser(8,"Zoe Kirsten","Helloworld","Villanueva","zoekv","zkvillanueva@yses.com","password","2013-04599","Projects and Activities Department","blendeD","active");


		$this->createUser(9,"Alden","Santos","Rcihards","aldenrichards","arichards@gma.com","password","2013-04399","Finance Department","Prautes Canonical","unconfirmed");
		$this->createUser(10,"Angel","Rodriguez","Locsin","therealdarna","angel@abscbn.com","password","2013-04499","Finance Department","Prautes Canonical","unconfirmed");
		$this->createUser(11,"Kris","Cojuanco","Aquino","bitchplease","kcaquino@abscbn.com","password","2013-01599","Finance Department","Prautes Canonical","unconfirmed");

		$this->createEvent(1,"PFJF","Control + Shift","Second Sem","2015",2,0);
		$this->createEvent(2,"Get 1/4","Overclocked","First Semester","2015",3,0);
		$this->createEvent(3,"PFJF","Decode Your Future","Second Sem","2016",4,0);

		$this->createCommittee(1,"Visuals Committee",0,3);
		$this->createCommittee(2,"Promotions Committee",0,3);
		$this->createCommittee(3,"Technical Committee",0,3);
		$this->createCommittee(4,"Secretariat Committee",0,3);
		$this->createCommittee(5,"Programs Committee",0,3);
		$this->createCommittee(6,"Finance Committee",0,3);

		$this->createHead(1,"Visuals Committee Head",5,1,3);
		$this->createHead(2,"Promotions Committee Head",6,2,3);
		$this->createHead(3,"Technical Committee Head",2,3,3);
		$this->createHead(4,"Secretariat Committee Head",7,4,3);
		$this->createHead(5,"Programs Committee Head",3,5,3);
		$this->createHead(6,"Finance Committee Head",8,6,3);
		}
		
		$this->createMember(1,2,1);

		return redirect('/home');
	}

	public function removeData() {
		$heads = Head::all();
		foreach($heads as $head) $head->delete();

		$comms = Committee::all();
		foreach($comms as $comm) $comm->delete();

		$events = Event::all();
		foreach($events as $event) $event->delete();

		$users = User::all();
		foreach($users as $user) $user->delete();

		return redirect('/home');
	}

}
