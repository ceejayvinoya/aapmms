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

            var columns = addAllColumnHeaders(data);

            for (var i = 0 ; i < data.length ; i++) {
                var row$ = $('<tr/>');
                for (var colIndex = 0 ; colIndex < columns.length ; colIndex++) {
                    var cellValue = data[i][columns[colIndex]];
        
                    if (cellValue == null) { cellValue = ""; }
        
                    row$.append($('<td/>').html(cellValue));
                }
                $("#excelDataTable").append(row$);
       }
        },
    });
});

function addAllColumnHeaders(data)
 {
     var columnSet = [];
     var headerTr$ = $('<tr/>');
 
     for (var i = 0 ; i < data.length ; i++) {
         var rowHash = data[i];
         for (var key in rowHash) {
             if ($.inArray(key, columnSet) == -1){
                 columnSet.push(key);
                 headerTr$.append($('<th/>').html(key));
             }
         }
     }
     $("#excelDataTable").append(headerTr$);
 
return columnSet;
 }
