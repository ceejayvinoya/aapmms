$(document).ready(function(){
  $.ajax({
    url: "http://www.aapmms.me/chart_data.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var value = [];
      var time = [];

      for(var i in data) {
        value.push(data[i].value);
        time.push(data[i].timestamp);
      }

      var chartdata = {
        labels: time,
        datasets : [
          {
            label: 'value',
            fill: false,
            backgroundColor: 'rgba(243, 18, 156 , 1)',
            borderColor: 'rgba(243, 18, 156 , 1)',
            data: value
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
                    text: "Incoming Air"
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
