<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="w3.css">
   <script type="text/javascript" src="jquery.min.js"></script>
   <script type="text/javascript" src="table.js"></script>
   <script src="infoscript.js"></script>
   <title>AAPMMS - DLSUD</title>
   <style type="text/css">
      th {
        font-weight : bold
      }
    </style>
</head>
<body>
<div id='cssmenu'>
<ul>
   <li><a href='index.php'><span>Home</span></a></li>
   <li class='active'><a href='#'><span>Tables</span></a></li>
   <li class='last'><a href='about.html'><span>About</span></a></li>
</ul>
</div>
<div class="w3-container w3-khaki">
   <h2>Automated Air Pollution Monitoring and Mitigation System</h2>
   </div>
   
   <div class="w3-container w3-khaki">
<br><label>Input Date:</label><br>
<input class="w3-input w3-border" type="text" id="date" style="width: 320px" placeholder="yyyy-mm-dd">
<br>	
</div>

    <div class="w3-container w3-khaki" style="position: relative">
   <form method="post" style="display: inline-block">
<button class="w3-btn w3-lime" type="button" id="submit">Submit</button>

</form>
   
   <form method="get" style="display: inline-block">
   <button class="w3-btn w3-lime" type="button" id="refresh">Refresh</button>
   </form>
</div>
   
   <div class="w3-container w3-khaki">
      <br>
      <table class="w3-table-all" id="excelDataTable">
      </table>
      <br>
      <br>
   </div>
</body>
</html>
