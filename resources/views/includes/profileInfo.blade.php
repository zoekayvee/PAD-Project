<div class="row informations">
  <div class="col-lg-3 profile">
    <div>
      <img src="{{asset('images/back.jpg')}}" class="displayPic" alt="you">
    </div>
    <div class="info">
      {{ $user->username }}
    </div>
    <div class="info">
      {{ $user->lname }}, {{ $user->fname }} {{ $user->mname }} 
    </div>
    <div class="info">
      {{ $user->studno }}
    </div>
    <div class="info">
      {{ $user->department }}
      </div>
    <div class="info">
      {{ $user->batch }}                        
    </div>
  </div>

  <hr>

  <div class="table-responsive col-lg-9">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Event</th>
          <th>Semester</th>
          <th>Position</th>
          <th>Committee</th>
        </tr>
      </thead>
      <tbody>
        @foreach($events as $event)
        <tr>
          <td><a href="#">{{$event->title}} : {{$event->theme}}</a></td>
          <td>{{$event->sem}}, {{$event->year}}</td>
          <td>Member</td>
          <td>Sec</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>