//var task_progress = <?php echo json_encode($task_progress) ?>;
//var task_progress = {{ $task_progress }}
//var task_progress = {!! json_encode($task_progress) !!};

/*
var pending = 100 - task_progress;

var pieData = [
    {
        value: task_progress,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Completed"
    },
    {
        value: pending,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "On the process"
    }
];


window.onload = function(){
    var elements = document.getElementsByClassName('chart-area');
    for (var i = 0; i < elements.length; i++) {
        var ctx = elements[i].getContext("2d");
        window.myPie = new Chart(ctx).Pie(pieData);
    }
};

var progress = document.getElementById("progress").value;
function changeProgress () {
    
    pieData[0].value = progress;
    pieData[1].value = 100-progress;
};*/