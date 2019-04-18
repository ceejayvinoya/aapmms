<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
th {
background-color: #588c7e;
color: white;
}

tr {
background-color: #f2f2f2
}

.button {
background-color: #4CAF50;
border: none;
color: white;
padding: 15px 25px;
text-align: center;
font-size: 16px;
cursor: pointer;
}

.button:hover {
background-color: green;
}

.dropbtn {
background-color: #4CAF50;
border: none;
color: white;
padding: 15px 25px;
text-align: center;
font-size: 16px;
cursor: pointer; 
}

.dropbtn:hover, .dropbtn:focus {
background-color: green;
}

.dropdown {
position: relative;
display: inline-block;
}

.dropdown-content {
display: none;
position: absolute;
background-color: #f1f1f1;
min-width: 160px;
overflow: auto;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
z-index: 1;
}

.dropdown-content a {
color: black;
padding: 12px 16px;
text-decoration: none;
display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}

.submit {
border-radius: 20px;
background-color: green;
border: none;
color: white;
padding: 15px 25px;
text-align: center;
font-size: 16px;
cursor: pointer;       
}

.submit:hover {
background-color: #4CAF50;
}

#rcorners1 {
border-radius: 5px;
background: #4CAF50;
text-align: center;
width: 100%;
border: 3px solid blue;
height: 60px;
}

#rcorners2 { 
border-radius: 5px;
background: #4caf50;
text-align: left;
width: 100%;
height: 100px;
border: 3px solid blue;  
}

#rcorners3 {
display: inline;
text-align: center;
margin: 5px;
border-radius: 5px;
background: #00008b;
width: 150px;
height: 60px;  
}

#rcorners4 {
display: inline;
text-align: center;
margin: 5px;
border-radius: 5px;
background: #00008b;
width: 150px;
height: 60px;  
}

#rcorners5 {
display: inline;
text-align: center;
margin: 5px;
border-radius: 5px;
background: #00008b;
width: 150px;
height: 60px;  
}



</style>
</head>
<body style = "background: url(https://lh3.googleusercontent.com/-mxFzH7MEQgs/VLras1EBN3I/AAAAAAAAJWM/otq3uDxbwos/w2048-h1152/adwaita-morning.jpg); background-size: 100%;">
<h1 id="rcorners1" style="font-family:monospace;">**AUTOMATED AIR POLLUTION MITIGATION AND MONITORING SYSTEM**</h1>

<div id="rcorners2">

<form style='display: inline;' method="post" action="info.php">
    <button id="rcorners4" class="button" type="submit">PM Data</button>
</form>

<!--Dropdown status-->
<div class="dropdown" >
  <button style='display: inline;' onclick="myFunction()" id="rcorners5" class="dropbtn">Status</button>
  <div id="myDropdown" class="dropdown-content">
   <table style="width:50%">
  <tr>
    <th>Hardware</th>
    <th>Status</th> 
    
  </tr>
<?php
    $jsondata = file_get_contents("https://api.thingspeak.com/channels/743613/feeds.json?api_key=R63HB8RHEB1IUOZF&timezone=Asia/Hong_Kong&results=1");
    $json = json_decode($jsondata, true);

    $timestamp = $json['feeds'][0]['created_at'];

    $divider = explode("T",$timestamp);
    $date = $divider[0];
    $timeset = $divider[1];

    $timefix = explode("+",$timeset);
    $time = $timefix[0];

    $B = date("Y-m-d h:i:s");

    $timeA = strtotime($date.' '.$time);
    $timeB = strtotime($B);

    if(300 > $timeB - $timeA){
        echo '<tr><td align="center">Sensor 1</td><td align="center">Running</td></tr>';
    } else {
        echo '<tr><td align="center">Sensor 1</td><td align="center">Inactive</td></tr>';
    }

     $jsondata = file_get_contents("https://api.thingspeak.com/channels/754899/feeds.json?api_key=PJ2C7CICC344DUVR&timezone=Asia/Hong_Kong&results=1");
    $json = json_decode($jsondata, true);

    $timestamp = $json['feeds'][0]['created_at'];

    $divider = explode("T",$timestamp);
    $date = $divider[0];
    $timeset = $divider[1];

    $timefix = explode("+",$timeset);
    $time = $timefix[0];

    $B = date("Y-m-d h:i:s");

    $timeA = strtotime($date.' '.$time);
    $timeB = strtotime($B);

    if(300 > $timeB - $timeA){
        echo '<tr><td align="center">Sensor 2</td><td align="center">Running</td></tr>';
    } else {
        echo '<tr><td align="center">Sensor 2</td><td align="center">Inactive</td></tr>';
    }    
?>
<!--  <tr><td align="center">Sensor 1</td><td align="center">Normal</td></tr>
  <tr>
  
   <td align="center">Sensor 2</td>
   <td align="center">Normal</td>
    
  </tr>
-->
</table>

  </div>
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

<button id="rcorners3" class="button" onClick="alert('One of the world’s leading problem is air pollution and there are many forms of pollutant that contribute in air pollution. Particulate matter which is the sum of all solid and liquid particles suspended in air many of which are hazardous. This complex mixture includes both organic and inorganic particles, such as dust, pollen, soot, smoke, and liquid droplets.This website monitors the daily value of particulate matter and with the hardware installed along Aguinaldo Highway, users can see progress of the mitigation through this website.” ')">About</button>

<div style = "position: absolute; right: 51%; margin-left: 450px; top: 240px">

<iframe width="450" height="260" style="border: 5px solid #00008b;" src="https://thingspeak.com/channels/743613/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&api_key=C3JY2CR1I5TT22F1&results=60&type=line&update=15"></iframe>

<iframe width="450" height="260" style="border: 5px solid #00008b;" src="https://thingspeak.com/channels/743613/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&api_key=C3JY2CR1I5TT22F1&results=60&type=line&update=15"></iframe>

</div>

<div style = "position: absolute; left: 51%; top: 240px">

<iframe width="450" height="260" style="border: 5px solid #00008b;" src="https://thingspeak.com/channels/754899/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&api_key=GVG0HRXKSNZ1IEFH&results=60&type=line&update=15"></iframe>

<iframe width="450" height="260" style="border: 5px solid #00008b;" src="https://thingspeak.com/channels/754899/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&api_key=GVG0HRXKSNZ1IEFH&results=60&type=line&update=15"></iframe>

</div>
</body>
</html>
