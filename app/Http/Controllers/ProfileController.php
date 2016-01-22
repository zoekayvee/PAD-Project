<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Middleware\Authenticate;
use App\Committee;
use App\Event;
use App\User;
use App\Head;
use App\Task;
use App\Member;
use App\Comment;	

class ProfileController extends Controller {

	//middleware to prevent guest to access sub routes
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getUser()
	{
		$user = \Auth::user();
		return $user;
	}


	public function getIndex()
	{
		$users = User::all();
		$user = $this->getUser();
		$curr_event = Event::latest('id')->first();
		$all_comm = Committee::all();
		$committees = Committee::where('event_id', $curr_event->id)->get();
		$comm_array = Committee::where('event_id', $curr_event->id)->get(array('id'))->toArray();
		$events = Event::all();
		$tasks = Task::where('assigned_to', $user['id'])->whereIn('comm_id', $comm_array)->get();	//tasks assigned to current user
		$all_tasks = Task::all();
		$categories = array('Pending', 'In-progress', 'Delayed', 'Finished');
		$comments = Comment::all();

		//get current event id
		$curr_event_id = $curr_event->id;

		
		//check if current user is upper head

			//get all heads of current event
			$heads = Head::where('event_id', $curr_event_id)->where('user_id', $user->id)->get();
			//get all comm_id(as array) in the current event where current user is a head 
			$heads_comm = Head::where('event_id', $curr_event_id)->where('user_id', $user['id'])->get(array('comm_id'))->toArray();
			//get all committees in the current event where current user is a head 
			$head_committees = Committee::whereIn('id', $heads_comm)->get();

			//current user is a head 
			$heads_comm = Head::where('user_id', $user['id'])->get();
			
			//committees where current user is a member 
			$mem_comm = Member::where('user_id', $user['id'])->get();

		$url = "pages/profile";
		//check if curret user is admin
		if($user->id == 1) {
			return redirect('/admin/');
		}

		//check if current user is OAH
		if($curr_event->oah_id == $user->id) $url = "pages/oah";

		//return heads page if user is lower head
		if($heads != "[]") $url = "pages/heads";

		if($user->standing == "unconfirmed") $url = "pages/oops";

		return view($url, compact('users', 'user', 'events', 'all_comm','committees', 'tasks', 'all_tasks', 'categories', 'comments', 'head_committees', 'heads_comm', 'mem_comm'));
	}

	
	public function edit($id)
	{
	   $task=Task::find($id);
	   return view('profile.edit',compact('task'));
	}

	//UPDATE TASK
	public function update($id, Request $request)
	{
	   
	   $taskUpdate=$request->all();
	   $task=Task::find($id);
	   $task->update($taskUpdate);	

	   if($task->progress <= 100 && $task->progress >= 0){
	   		
	   		if($task->progress == 100){
	   			$task->remark = "Finished";
	   		}else if($task->progress == 0){
	   			$task->remark = "Pending";
	   		}else{
	   			$task->remark = "In-Progress";
	   		}
	   }else{
	   		if($task->progress > 100){
	   			$task->remark = "Finished";
	   			$task->progress = 100;
	   		}else{
	   			$task->remark = "Pending";
	   			$task->progress = 0;
	   		}
	   }
	   $task->update();

	   //if(Carbon::createFromDate($year, $month, $day) > $task->deadline && $task->progress != 100){
   		//	$task->remark = "Delayed";
   		//}

	   //updateProgress($task);

	   return redirect('profile');
	}

	//DELETE TASK
	public function destroy($id)
	{
	   $task=Task::find($id);
	   $task->weight = 0;
	   Task::find($id)->delete();

	   //$this->updateProgress($task);
	   return redirect('profile');
	}

	public function updateProgress($task)
	{
		$comm = Committee::where('id', $task['comm_id'])->first();
       	$evnt = Event::where('id', $comm['event_id'])->first();

	   	//UPDATING WEIGHT OF COMMITTEE AND EVENT
        $comm->increment('weight', $task['weight']);
        $evnt->increment('weight', $task['weight']);

        //UPDATING PROGRESS OF COMMITTEE
        $progress = 0;
        $tasks = Task::where('comm_id', $comm->id)->get();
        foreach ($tasks as $task1) {
                $progress += ($task1->weight * $task1->progress);
           
        }
        $progress = $progress / ($comm->weight);
        $comm->progress = $progress;
        $comm->save();

        //UPDATING PROGRESS OF EVENT
        $progress2 = 0;
        $committees = Committee::all();
        foreach ($committees as $committee) {
            if($committee->event_id == $evnt->id){
                $progress2 += ($committee->weight * $committee->progress);
            }
        }
        $progress2 = $progress2 / ($evnt->weight);
        $evnt->progress = $progress2;
        $evnt->save();
	}

	//ADD COMMENT
	public function store(Request $request)
	{

	  	$comment=$request->all();

	   	Comment::create($comment);
		return redirect('profile');
	}

	//FOR PREVIOUS EVENTS
	public function getId($id)
	{

	  	$users = User::all();
		$user = $this->getUser();
		$curr_event = Event::where('id', $id)->first();
		$all_comm = Committee::all();
		$committees = Committee::where('event_id', $curr_event->id)->get();
		$comm_array = Committee::where('event_id', $curr_event->id)->get(array('id'))->toArray();
		$events = Event::all();
		$tasks = Task::where('assigned_to', $user['id'])->whereIn('comm_id', $comm_array)->get();	//tasks assigned to current user
		$all_tasks = Task::all();
		$categories = array('Pending', 'In-progress', 'Delayed', 'Finished');
		$comments = Comment::all();

		//get current event id
		$curr_event_id = $curr_event->id;

		
		//check if current user is upper head

			//get all heads of current event
			$heads = Head::where('event_id', $curr_event_id)->where('user_id', $user->id)->get();
			//get all comm_id(as array) in the current event where current user is a head 
			$heads_comm = Head::where('event_id', $curr_event_id)->where('user_id', $user['id'])->get(array('comm_id'))->toArray();
			//get all committees in the current event where current user is a head 
			$head_committees = Committee::whereIn('id', $heads_comm)->get();

			//current user is a head 
			$heads_comm = Head::where('user_id', $user['id'])->get();
			
			//committees where current user is a member 
			$mem_comm = Member::where('user_id', $user['id'])->get();

		$url = "pages/profile";
		//check if curret user is admin
		if($user->id == 1) {
			return redirect('/admin/');
		}

		//check if current user is OAH
		if($curr_event->oah_id == $user->id) $url = "pages/oah";

		//return heads page if user is lower head
		if($heads != "[]") $url = "pages/heads";

		if($user->standing == "unconfirmed") $url = "pages/oops";

		echo $url;
		return view($url, compact('users', 'user', 'events', 'all_comm','committees', 'tasks', 'all_tasks', 'categories', 'comments', 'head_committees', 'heads_comm', 'mem_comm'));

	}
}
