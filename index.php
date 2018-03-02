

<html lang="en">
<head>
  <title>SuperEcho</title>
  <link rel="stylesheet" type="text/css" href="style.css">  
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div id="header">
  <img src="echo.png">
  <div id="logo">
  <span>Super Echo</span>
</div>
</div>

<?php

error_reporting(0); //return the current error reporting level
$get = json_decode(file_get_contents('http://ip-api.com/json/'),true); // info of current location
date_default_timezone_set($get['timezone']); // set time for my location

 $api_url = "http://api.openweathermap.org/data/2.5/weather?q=". $_GET['city'] ."," . $_GET['cuntry'] .  "&units=metric&appid=0db5c5424bf3b8e1af9e8a8c5eedec0d";
 $data = json_decode(file_get_contents($api_url),true);

 $icon = $data['weather'][0]['icon'];
 $logo = "<center><img src='http://openweathermap.org/img/w/".$icon.".png'></center>";
?>

<div class="container">

  <h3 style="font-size:23;">Welcome</h3>
  <div class="heading" style="text-align: center;"><p> Weather Now</p> <?php echo $logo;?> </div>
  <div id="left">
  <form method="GET" action="">
  <label>Country</label><br>
  <input type="text" name="cuntry"><br>
  <label>City</label><br><input type="text" name="city" required><br>
  <input id="sub" type="submit" class="submit" name="" value="submit">
  </form>
 </div>

 <div id="right">
  <?php

   echo "<p>" . $_GET['city'] . "," . $_GET['cuntry'] . " &nbsp &nbsp" .   $data['weather'][0]['description'] ."</p>";
    echo "<b>Temp:</b>" .$data['main']['temp'] . " C<br>";
    echo"<b>Clouds:</b>".$data['clouds']['all']."%<br>";
    echo "<b>Humidity:</b>".$data['main']['humidity']."%<br>";
    echo "<b>Wind Speed:</b>".$data['wind']['speed']."m/s<br>";
    echo "<b>Pressure:</b>".$data['main']['pressure']."hpa<br>";
    echo"<b>Sunrise:</b>".date('h:i A', $data['sys']['sunrise'])."<br>";
    echo "<b>Sunset:</b>".date('h:i A', $data['sys']['sunset']);
    ?>
 </div>
</div>
<footer >
<br>
<h5>Copyright &copy; 2017 SuperEcho Team</h5>
</footer>
</body>
</html>