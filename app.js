$(document).ready(function(){
  $.ajax({
    url: "http://www.aapmms.me/chart_data.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var value = [];
      var time = [];

      for(var i in data) {
        value.push("value " + data[i].value);
        time.push(data[i].time);
      }

      var chartdata = {
        labels: time,
        datasets : [
          {
            label: 'value',
            backgroundColor: 'rgba(243, 18, 156 , 1)',
            borderColor: 'rgba(243, 18, 156 , 1)',
            
            data: values
          }
        ]
      };

      var ctx = $("#mycanvas");

      var barGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
});
