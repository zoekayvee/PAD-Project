<div class="col-lg-3">
  <div class="side">
    <div>
      <img src="{{asset('images/back.jpg')}}" class="displayPic" alt="you">
    </div>

    <div class="info">
      {{ $user['username'] }}
    </div>
    <div class="info">
      {{ $user['lname'] }}, {{ $user['fname'] }} {{ $user['mname'] }} 
    </div>
    <div class="info">
      {{ $user['studno']}}
    </div>
    <div class="info">
      {{ $user['department']}}
      </div>
    <div class="info">
      {{ $user['batch']}}                        
    </div>
  </div>
  <div class="side table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Event</th>
            <th>Position</th>
            <th>Comm</th>
          </tr>
        </thead>
        <tbody>
          @foreach($events as $event)
          <tr>
            <td><a href="#">{{$event->title}} : {{$event->theme}}</a></td>
            <td>Member</td>
            <td>Sec</td>
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>
  </div>
</div>