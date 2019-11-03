$(document).ready(function(){
  $.ajax({
    url: "http://www.aapmms.me/chart_data.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var apm25 = [];
      var bpm25 = [];
      var time = [];

      for(var i in data) {
        apm25.push(data[i].incoming);
        bpm25.push(data[i].outgoing);
        time.push(data[i].timestamp);
      }

      var chartdata = {
        labels: time,
        datasets : [
          {
            label: 'Incoming Air (ug/m3)',
            fill: false,
            backgroundColor: 'rgba(243, 18, 156 , 1)',
            borderColor: 'rgba(243, 18, 156 , 1)',
            data: apm25
          },{
                label: 'Outgoing Air (ug/m3)',
                fill: false,  //Try with true
                backgroundColor: 'rgba( 243, 156, 18 , 1)', //Dot marker color
                borderColor: 'rgba( 243, 156, 18 , 1)', //Graph Line Color
                data: bpm25
            }
        ]
      };

      var ctx = $("#mycanvas");

      var barGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata,
        options: {
            title: {
                    display: true,
                    text: "Air PM Sensor Results"
                },
            maintainAspectRatio: false,
            elements: {
            line: {
                    tension: 0.5 //Smoothening (Curved) of data lines
                }
            },
            scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
            }
        }
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
});
