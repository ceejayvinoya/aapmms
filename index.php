<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="w3.css">
   <title>AAPMMS - DLSUD</title>
   <style type="text/css">
      #chart-container {
        width: 60%;
        height: 360px;
        margin: 0 auto;
         float: left;
      }
    </style>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li class='active'><a href='#'><span>Home</span></a></li>
   <li><a href='info.php'><span>Tables</span></a></li>
   <li class='last'><a href='about.html'><span>About</span></a></li>
</ul>
</div>

<div class="w3-container w3-lime">
   <h1>Automated Air Pollution Monitoring and Mitigation System</h1>
   </div>
<div id="chart-container" class="w3-container" style = "position: relative">
   <canvas id="mycanvas"></canvas>
   </div>
   <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="chart.min.js"></script>
<script type="text/javascript" src="app.js"></script>

</body>
</html>
