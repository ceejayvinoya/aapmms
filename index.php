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
</head>

<body class="w3-teal">

<div id='cssmenu'>
<ul>
   <li class='active'><a href='#'><span>Home</span></a></li>
   <li><a href='info.php'><span>Incoming Air</span></a></li>
   <li><a href='outfo.php'><span>Outgoing Air</span></a></li>
   <li><a href='status.php'><span>Status Update</span></a></li>
   <li class='last'><a href='about.html'><span>About</span></a></li>
</ul>
</div>

<div class="w3-container w3-teal">
   <h1>Automated Air Pollution Monitoring and Mitigation System</h1>
   <h2>Incoming Air PM Sensor</h2>
   </div>
<div class="w3-container w3-teal" style = "position: relative">
   <iframe width="340" height="196" style="max-width: 100%; display: inline-block; border: 2px solid #00008b;" src="http://www.aapmms.me/graph.html"></iframe>
</div>
   
<div class="w3-container w3-teal">
   <h2>Outgoing Air PM Sensor</h2>
</div>
   
<div class="w3-container w3-teal" style = "position: relative">
   <iframe width="340" height="196" style="max-width: 100%; display: inline-block; border: 2px solid #00008b;" src="https://thingspeak.com/channels/769993/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&api_key=4LWAS8YZEWE9FFB8&results=30&type=line&update=15&height=196&width=340&title=Outgoing+Sensor+PM+2.5"></iframe>
</div>

</body>
</html>
