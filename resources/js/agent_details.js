$(function (){
    var id = $("#details_owner").attr('data-id')
    function GetAgentDetails(id){
        $.ajax({
            method: "GET",
            url: ("/agent/log/"+id),
        }).done(function( msg ) {
            drawHddChart(msg.hdd)
            drawRamChart(msg.ram)
            console.log(msg)
        });

        function drawHddChart(msg) {
            console.log("data is", msg)

            var barChartData = {
                labels: msg.labels,
                datasets: [{
                    label: 'Summary',
                    backgroundColor: "blue",
                    data: msg.summary,
                    borderColor: 'white',
                    borderWidth: 2,
                }, {
                    label: 'Used',
                    backgroundColor: "red",
                    data: msg.used,
                    borderColor: 'white',
                    borderWidth: 2
                }, ]

            };
            var myBar = null;
            var ctx = document.getElementById("hddLog");
            myBar = new Chart(ctx,
                {
                    type: 'bar',
                    data: barChartData,
                    options: {
                        responsive: false,
                    }
                }
            );
        }
        function drawRamChart(msg){
            console.log("data is ", msg)
            var barChartData = {
                labels: msg.labels,
                datasets: [{
                    label: 'Summary',
                    backgroundColor: "blue",
                    data: msg.summary,
                    borderColor: 'white',
                    borderWidth: 2,
                }, {
                    label: 'Used',
                    backgroundColor: "red",
                    data: msg.used,
                    borderColor: 'white',
                    borderWidth: 2
                }, ]

            };
            var myBar = null;
            var ctx = document.getElementById("ramLog");
            myBar = new Chart(ctx,
                {
                    type: 'bar',
                    data: barChartData,
                    options: {
                        responsive: false,
                    }
                }
            );
        }
    }
    GetAgentDetails(id)
})
