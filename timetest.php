<?php
    $jsondata = file_get_contents("https://api.thingspeak.com/channels/754899/feeds.json?api_key=PJ2C7CICC344DUVR&results=1");
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
echo $timeA;
echo $timeB;
?>
