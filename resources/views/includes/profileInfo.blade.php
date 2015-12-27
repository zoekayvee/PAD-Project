            <div class="col-lg-3">
                <div class="wrapper side">
                    <div>
                        <img src="images/back.jpg" class="displayPic" alt="you">
                    </div>
                    <div class="info">
                        {{ $user['username'] }}
                    </div>
                    <div class="info">
                        {{ $user['lname'] }}, {{ $user['mname'] }} {{ $user['fname'] }}
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
  

  <div class="wrapper side table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Event</th>
            <th>Position</th>
            <th>Comm</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><a href="#">Get 1/4 2015</a></td>
            <td>Member</td>
            <td>Sec</td>
          </tr>
          <tr>
            <td><a href="#">PF/JF 2016</a></td>
            <td>Member</td>
            <td>Prom</td>
          </tr>
          <tr>
            <td><a href="#">Get 1/4 2016</a></td>
            <td>Member</td>
            <td>VL</td>
          </tr>
        </tbody>
      </table>
  </div>
</div>