function pmcall(){
    $("#aqidiv").load("pmdisplay.php");
}

$(document).ready(function(){
  $('#submit').on('click', function(){
    pmcall();
    setInterval(pmcall, 5000);
    });
});
