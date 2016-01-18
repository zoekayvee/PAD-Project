<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;
use App\Event;
use App\Committee;
use App\Head;
use App\Task;
use App\Member;

class TaskController extends Controller {

	function getTask() {
        $user = \Auth::user();
        $events = Event::all();
        $event = Event::latest('id')->first();
        $tasks = Task::all();
        $categories = array('Pending', 'In-progress', 'Delayed', 'Finished');

        //Array of head->id of user
        $heads_comm = Head::where('event_id', $event->id)->where('user_id', $user->id)->get(array('comm_id'))->toArray();
        //members of committee
        $mem = Member::whereIn('comm_id', $heads_comm)->get(array('user_id'))->toArray();
        $members = User::whereIn('id', $mem)->get();

        //committees where user is head
        $committees = Committee::whereIn('id', $heads_comm)->get();	
  		return view('pages/task', compact('user', 'members', 'events', 'event','committees', 'tasks', 'categories'));
	}

	function postTask(Request $request) {
		$task = $request->all();
        Task::create($task);
        
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

		return redirect('profile');
	}
}
