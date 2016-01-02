var pieData = [
    {
        value: 96,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Completed"
    },
    {
        value: 4,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "On the process"
    }
];

window.onload = function(){
    var ctx = document.getElementById("chart-area").getContext("2d");
    window.myPie = new Chart(ctx).Pie(pieData);
};

var progress = document.getElementById("progress").value;
function changeProgress () {
    pieData[0].value = progress;
    pieData[1].value = 100-progress;
};