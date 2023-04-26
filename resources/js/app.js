/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

document.addEventListener("DOMContentLoaded", function (event) {

    const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId)

// Validate that all variables exist
        if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener('click', () => {
// show navbar
                nav.classList.toggle('show')
// change icon
                toggle.classList.toggle('bx-x')
// add padding to body
                bodypd.classList.toggle('body-pd')
// add padding to header
                headerpd.classList.toggle('body-pd')
            })
        }
    }

    showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')

    function colorLink() {
        if (linkColor) {
            linkColor.forEach(l => l.classList.remove('active'))
            this.classList.add('active')
        }
    }

    linkColor.forEach(l => l.addEventListener('click', colorLink))

    // Your code to run since DOM is loaded and ready
});

$(function (){
    console.log("Jquery loaded")

    function GetAgentDetails(id){
        $.ajax({
            method: "GET",
            url: ("/agent/log/"+id),
        }).done(function( msg ) {
            drawHddChart(msg.hdd)
            console.log(msg)
        });

        function drawHddChart(msg) {
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
            window.onload = function() {
                var ctx = document.getElementById("hddLog").getContext("2d");
                myBar = new Chart(ctx, {
                    type: 'bar',
                    data: barChartData,
                    options: {
                        responsive: false,
                    }
                });
            };

        }

    }

    GetAgentDetails(1)
})
