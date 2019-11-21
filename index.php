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
   <script type="text/javascript" src="aqi.js"></script>
   <title>AAPMMS - DLSUD</title>
   <style type="text/css">
      #wrapper{
         overflow: hidden;
      }
     @media screen and (max-width: 600px) {
         #chart-container {
            display: none;
        width: 60%;
        float: left;
        height: 360px;
        margin: 25px;
        padding: 20px;
        border: 3px solid blue;
        background-color: white;
      }
      
      }
      #chart-container {
        width: 60%;
        float: left;
        height: 360px;
        margin: 25px;
        padding: 20px;
        border: 3px solid blue;
        background-color: white;
      }
      #aqidiv {
         width: 25%;
         
         overflow: hidden;
         height: 360px;
         margin: 25px;
         padding: 20px;
         border: 3px solid green;
         background-color: white;
      }
      body {
        background-color: khaki;
      }
      h2 {
        text-align: center;
      }
    </style>
</head>

<body onLoad="buildHtmlTable()">
   <div id='cssmenu'>
      <ul>
      <li class='active'><a href='#'><span>Home</span></a></li>
      <li><a href='info.php'><span>Tables</span></a></li>
      <li class='last'><a href='about.html'><span>About</span></a></li>
      </ul>
   </div>
   <div>
      <h2>Automated Air Pollution Monitoring and Mitigation System</h2>
   </div>
   <div id="wrapper">
      
      <div id="chart-container">
         <canvas id="mycanvas"></canvas>
      </div><div id="aqidiv">
         
      </div>
      
   </div>
   <br>
   <br>
</body>
</html>
