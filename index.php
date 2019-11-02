<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>AAPMMS - DLSUD</title>
   <style type="text/css">
      #chart-container {
        width: 80%;
        height: 480px;
        margin: 0 auto;
      }
    </style>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li class='active'><a href='#'><span>Home</span></a></li>
   <li><a href='info.php'><span>Incoming Air</span></a></li>
   <li><a href='outfo.php'><span>Outgoing Air</span></a></li>
   <li><a href='status.php'><span>Status Update</span></a></li>
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
