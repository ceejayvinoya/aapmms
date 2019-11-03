
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="w3.css">
   <script type="text/javascript" src="jquery.min.js"></script>
   <script type="text/javascript" src="chart.min.js"></script>
   <script type="text/javascript" src="app.js"></script>
   <script type="text/javascript" src="table.js"></script>
   <title>AAPMMS - DLSUD</title>
   <style type="text/css">
      #chart-container {
        width: 60%;
        height: 360px;
        margin: 0 auto;
        float: left;
      }
      th {
        font-weight : bold
      }
    </style>
</head>
<body onLoad="buildHtmlTable()">
<div id='cssmenu'>
<ul>
   <li><a href='#'><span>Home</span></a></li>
   <li class='active'><a href='#'><span>Tables</span></a></li>
   <li class='last'><a href='about.html'><span>About</span></a></li>
</ul>
</div>
<div class="w3-container w3-lime">
   <h1>Automated Air Pollution Monitoring and Mitigation System</h1>
   </div>
   
   <div class="w3-container">
      <table id="excelDataTable" border="1">
      </table>
   </div>
</body>
</html>
