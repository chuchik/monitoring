$(function (){
    var id = $("#details_owner").attr('data-id')
    function GetAgentDetails(id){
        $.ajax({
            method: "GET",
            url: ("/agent/log/"+id),
        }).done(function( msg ) {
            drawHddChart(msg.hdd)
            drawRamChart(msg.ram)
            drawCpuChart(msg.cpu)
            drawDbChart(msg.db)
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

        function drawCpuChart(msg){
            console.log("data is ", msg)
            var barChartData = {
                labels: msg.labels,
                datasets: [{
                    label: 'Summary',
                    backgroundColor: "blue",
                    data: msg.summary,
                    borderColor: 'white',
                    borderWidth: 2,
                }]
            };
            var myBar = null;
            var ctx = document.getElementById("cpuLog");
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
        function drawDbChart(msg){
            console.log("data is ", msg)
            var barChartData = {
                labels: msg.labels,
                datasets: [ {
                    label: 'Connections',
                    backgroundColor: "red",
                    data: msg.connections,
                    borderColor: 'white',
                    borderWidth: 2
                }, ]
            };
            var myBar = null;
            var ctx = document.getElementById("dbLog");
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
