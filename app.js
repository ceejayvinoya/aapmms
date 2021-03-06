function fetchdata(){
$.ajax({
    url: "http://www.aapmms.me/chart_data.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var apm25 = [];
      var bpm25 = [];
      var time = [];

      for(var i in data) {
        apm25.push(data[i].Incoming);
        bpm25.push(data[i].Outgoing);
        time.push(data[i].Timestamp);
      }
        
      var chartdata = {
        labels: time,
        datasets : [
          {
            label: 'Incoming (ug/m3)',
            fill: false,
            backgroundColor: 'rgba(243, 18, 156 , 1)',
            borderColor: 'rgba(243, 18, 156 , 1)',
            data: apm25
          },{
                label: 'Outgoing (ug/m3)',
                fill: false,  //Try with true
                backgroundColor: 'rgba( 243, 156, 18 , 1)', //Dot marker color
                borderColor: 'rgba( 243, 156, 18 , 1)', //Graph Line Color
                data: bpm25
            }
        ]
      };

      var ctx = $("#mycanvas");

      var maxapm = Math.max(...apm25);
      var minbpm = Math.min(...bpm25);
        
      
        
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
                            min: minbpm, max: maxapm
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
}

$(document).ready(function(){
    fetchdata();
    setInterval(fetchdata, 5000);
});
