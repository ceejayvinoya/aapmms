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

<body>

<div id='cssmenu'>
<ul>
   <li class='active'><a href='#'><span>Home</span></a></li>
   <li><a href='info.php'><span>Incoming Air</span></a></li>
   <li><a href='outfo.php'><span>Outgoing Air</span></a></li>
   <li><a href='status.php'><span>Status Update</span></a></li>
   <li class='last'><a href='#', onClick="alert('One of the world’s leading problem is air pollution and there are many forms of pollutant that contribute in air pollution. Particulate matter which is the sum of all solid and liquid particles suspended in air many of which are hazardous. This complex mixture includes both organic and inorganic particles, such as dust, pollen, soot, smoke, and liquid droplets.This website monitors the daily value of particulate matter and with the hardware installed along Aguinaldo Highway, users can see progress of the mitigation through this website.')"><span>About</span></a></li>
</ul>
</div>

<div class="w3-container w3-teal">
   <h1>Incoming Air PM Sensor</h1>
   </div>
<div class="w3-container w3-teal" style = "position: relative; text-align: center">
<iframe width="340" height="196" style="max-width: 100%; display: inline-block; border: 2px solid #00008b;" src="https://thingspeak.com/channels/743613/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&api_key=C3JY2CR1I5TT22F1&results=30&type=line&update=15&height=196&width=340"></iframe>

<iframe width="340" height="196" style="max-width: 100%; display: inline-block; border: 2px solid #00008b;" src="https://thingspeak.com/channels/743613/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&api_key=C3JY2CR1I5TT22F1&results=30&type=line&update=15&height=196&width=340"></iframe>
</div>
   
   <div class="w3-container w3-teal">
   <h1>Outgoing Air PM Sensor</h1>
   </div>
   
<div class="w3-container w3-teal" style = "position: relative; text-align: center">
<iframe width="340" height="196" style="max-width: 100%; display: inline-block; border: 2px solid #00008b;" src="https://thingspeak.com/channels/754899/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&api_key=GVG0HRXKSNZ1IEFH&results=30&type=line&update=15&height=196&width=340"></iframe>

<iframe width="340" height="196" style="max-width: 100%; display: inline-block; border: 2px solid #00008b;" src="https://thingspeak.com/channels/754899/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&api_key=GVG0HRXKSNZ1IEFH&results=30&type=line&update=15&height=196&width=340"></iframe>
</div>

</body>
</html>
