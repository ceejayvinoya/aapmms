function aqicall(){
    $("#aqidiv").load("aqidisplay.php");
}

$(document).ready(function(){
    aqicall();
    setInterval(aqicall, 5000);
});
