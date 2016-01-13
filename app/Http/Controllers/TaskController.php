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
        $event = Event::latest('created_at')->first();
        $tasks = Task::all();
        $categories = array('Pending', 'In-progress', 'Delayed', 'Finished');

        //committees where user is head
        $heads_comm = Head::where('user_id', $user->id)->get(array('comm_id'))->toArray();
        //members of committee
        $mem = Member::whereIn('comm_id', $heads_comm)->get(array('user_id'))->toArray();
        $users = User::whereIn('id', $mem)->get();

        $committees = Committee::whereIn('id', $heads_comm)->get();	
        //$matchThese = ['user_id' => $user['id'], 'event_id' => $event['event_id']];
        //$head = Head::where($matchThese)->get();
  		return view('pages/task', compact('user', 'users', 'events', 'committees', 'tasks', 'categories'));
	}

	function postTask(Request $request) {
		$task = $request->all();
		
		$comm = Committee::where('id', $task['comm_id'])->increment('weight', $task['weight']);
		$comm_eventid = Committee::where('id', $task['comm_id'])->first();

		$evnt = Event::where('id', $comm_eventid['event_id'])->increment('weight', $task['weight']);

		Task::create($task);
		return redirect('profile');
	}
}
