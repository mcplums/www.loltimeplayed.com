<?php

$id = $_POST["id"];

if (isset($id))
{
$encryptedaverage = $_POST["hash"];
$average = (($encryptedaverage / 55000));
$roundaverage = round($average,3)*1000;
mysql_connect("localhost", "wwwlolti_mcplums", "W965ds+-");
mysql_select_db("wwwlolti_goons");
mysql_query("UPDATE Reactions SET Reactionspeed = $average WHERE summonerid = $id");  
}

?>


<head>
<script type="text/javascript" src="canvasjs.min.js"></script>
<script type="text/javascript" src="jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="nhpup_1.1.js"></script>


<script type="text/javascript">
      window.onload = function () {
          var chartspeed = new CanvasJS.Chart("chartspeed", {
          
         axisX:{ 
   title: "Reaction speed (s)",
 },
 
axisY:{ 
   title: "No. of summoners",
 },


              data: [
              {
                  type: "line",
                  dataPoints: [
                  
<?php
$i=0;
//ini_set('display_errors',1); 
//error_reporting(E_ALL);
mysql_connect("localhost", "wwwlolti_mcplums", "W965ds+-");
mysql_select_db("wwwlolti_goons");
$results = mysql_query("SELECT ROUND(Reactionspeed, 2) AS bucket, COUNT(*) AS COUNT FROM Reactions WHERE Reactionspeed >= 0.1 AND Reactionspeed <= 0.5 GROUP BY bucket")  or die(mysql_error());
$avg = mysql_query("SELECT AVG(Reactionspeed) FROM Reactions WHERE Reactionspeed >= 0.1 AND Reactionspeed <= 0.5")  or die(mysql_error());
$avspeed = mysql_fetch_row($avg);
$ts = mysql_query("SELECT COUNT(Reactionspeed) FROM Reactions WHERE Reactionspeed >= 0.1 AND Reactionspeed <= 0.5") or die(mysql_error());
$total = mysql_fetch_row($ts);
$age = mysql_query("SELECT AVG(age) FROM Reactions WHERE age > 0 AND age < 80") or die(mysql_error());
$avage = mysql_fetch_row($age);
//$median = mysql_query("SELECT ROUND(Reactionspeed, 2) AS bucket, COUNT(*) AS COUNT FROM Reactions WHERE Reactionspeed >= 0.1 AND Reactionspeed <= 0.5 ORDER BY bucket DESC ")  or die(mysql_error());




while ($row = mysql_fetch_array( $results ))
{
//$y = $row[1]/$total[0];
$y = $row[1];

if ($i==0)
{
echo '{ x: '.$row[0].', y: '.$y.' }';
$i=1;
}
else 
{
echo ', { x: '.$row[0].', y: '.$y.' }';
}


}


?>

]
              }            ]
          });
 
          chartspeed.render();
          chartspeed = {};
          
          var chartage = new CanvasJS.Chart("chartage", {
          
         axisX:{ 
   title: "Age",
 },
 
axisY:{ 
   title: "Reaction speed (s)",
 },


              data: [
              {
                  type: "line",
                  dataPoints: [
                 
               
                  
<?php

$j=0;


for ($i=9; $i<50; $i++)
{

$results = mysql_query("SELECT AVG(Reactionspeed) FROM Reactions WHERE Reactionspeed > 0.1 AND Reactionspeed < 1 AND age = '".$i."'")  or die(mysql_error());
$av = mysql_fetch_row($results);
$count = mysql_query("SELECT COUNT(age) FROM Reactions WHERE Reactionspeed > 0.1 AND Reactionspeed < 1 AND age = '".$i."'")  or die(mysql_error());
$avcount = mysql_fetch_row($count);

if ($avcount[0]>50)
{
if ($j==0)
{
echo '{ x: '.$i.', y: '.round($av[0],3).' }';
$j=4;
}
else
{
echo ', { x: '.$i.', y: '.round($av[0],3).' }';
}

}


}
?>
]
              }            ]
          });
 
          chartage.render();
          chartage = {};
      }
  </script>



 <title>Loltimeplayed.com</title>
 <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
<meta content="en-gb" http-equiv="Content-Language">
<meta name="description" content="League of Legends time played calculator. Ever wondered how long you've spent playing? In addition to calculating total time, Loltimeplayed.com calculates your elo earnt per hour and breaks down your time between queues, including normal games, ranked, ARAM, 3v3, Dominion- all games except custom are included.">
<meta name="keywords" content="Lol, League of legends, timeplayed, loltimeplayed,league calculator">
<meta name="indentifier-url" content="http://loltimeplayed.com" />
<meta name="robots" content="follow,index"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles.css">
<style type="text/css">

a {
	color:white
}

#pup {
  position:absolute;
  z-index:200; /* aaaalways on top*/
  padding: 3px;
  margin-left: 10px;
  margin-top: 5px;
  width: 250px;
  border: 1px solid black;
  background-color: #777;
  color: white;
  font-size: 0.95em;
}

    .auto-style56 {
	text-align: center;
	color: #78C9F8;
	font-size: x-large;
	background-color: #005B96;
}

body {font-size : 10pt; font-family : Arial, sans-serif; margin-left : 15px; margin-right : 0px}
p {font-size : 10pt; font-family : Arial, sans-serif}
li {font-size : 10pt; font-family : Arial, sans-serif}
a {font-size : 10pt; font-family : Arial, sans-serif}
.title {font-size : 12pt; font-family : Arial, sans-serif; font-weight : bold}
.reg {font-size : 10pt; font-family : Arial, sans-serif}
.smaller {font-size : 9pt; font-family : Arial, sans-serif}
.copy {font-size : 8pt; font-family : Arial, sans-serif; color : #000000}
a:hover {color : #000099}


</style>
</head>






<body style="color: #FFFFFF; background-color: #000000">
<br><br>
<br><br>


<table ALIGN ="CENTER" "style="width: 600px">

	<tr>
		<td class="auto-style7"><a href="http://www.loltimeplayed.com/">
		<img src="http://www.loltimeplayed.com/img/logo2.jpg" style="border-width: 0px"></a><br><br><br><br>

		</td>
	</tr>

</table><br>


<?php

if (isset($id))
{
echo '<table ALIGN ="CENTER" style="width: 600" class="auto-style5" cellpadding="0" cellspacing="0">
	<tr><td class="auto-style56"><br style="font-size: medium">
		<span style="font-size: medium"><b>Your reaction speed is '.$roundaverage.'ms  		</b><br>
		<br></span></td></tr></table><br>';

}
?>

<table ALIGN ="CENTER" style="width: 600" class="auto-style5" cellpadding="0" cellspacing="0">
	<tr><td class="auto-style56"><br style="font-size: medium">
		<span style="font-size: medium"><?php echo number_format((float) $total[0],0,'.',','); ?> players have taken the test<a style="color: #78C9F8"; onmouseover="nhpup.popup('Players submitting reaction times below 100ms and above 500ms have not been included, likewise ages below 10 and above 80');">*</a>. The mean reaction time of all players is <?php echo (round($avspeed[0],3)*1000); ?> ms and the mean age is <?php echo (round($avage[0],1)); ?>  		<br>
		<br></span></td>

	</tr>
</table><br>

<table ALIGN ="CENTER" style="width: 600" class="auto-style5" cellpadding="0" cellspacing="0">
	<tr><td class="auto-style56"><br style="font-size: medium">
		<span style="font-size: xx-large">Q</span><span style="font-size: medium"> 
		Is there a correlation between reaction speed and ability? </span>
		<span style="font-size: xx-large">YES</span><span style="font-size: medium"><br>
		<br></span></td>

	</tr>
</table><br>


<?php
$averagebronze = mysql_query("SELECT AVG(Reactionspeed) FROM Reactions WHERE Tier= 'Bronze' AND Reactionspeed >= 0.1 AND Reactionspeed <= 0.5")  or die(mysql_error());
$row = mysql_fetch_array( $averagebronze );
$avbronze = round($row[0],3)*1000;
$averagesilver = mysql_query("SELECT AVG(Reactionspeed) FROM Reactions WHERE Tier= 'Silver' AND Reactionspeed >= 0.1 AND Reactionspeed <= 0.5")  or die(mysql_error());
$row = mysql_fetch_array( $averagesilver );
$avsilver = round($row[0],3)*1000;
$averagegold = mysql_query("SELECT AVG(Reactionspeed) FROM Reactions WHERE Tier= 'Gold' AND Reactionspeed >= 0.1 AND Reactionspeed <= 0.5")  or die(mysql_error());
$row = mysql_fetch_array( $averagegold );
$avgold = round($row[0],3)*1000;
$averageplatinum = mysql_query("SELECT AVG(Reactionspeed) FROM Reactions WHERE Tier= 'Platinum' AND Reactionspeed >= 0.1 AND Reactionspeed <= 0.5")  or die(mysql_error());
$row = mysql_fetch_array( $averageplatinum );
$avplatinum = round($row[0],3)*1000;
$averagediamond = mysql_query("SELECT AVG(Reactionspeed) FROM Reactions WHERE Tier= 'Diamond' AND Reactionspeed >= 0.1 AND Reactionspeed <= 0.5")  or die(mysql_error());
$row = mysql_fetch_array( $averagediamond );
$avdiamond = round($row[0],3)*1000;
$averagechallenger = mysql_query("SELECT AVG(Reactionspeed) FROM Reactions WHERE Tier= 'Challenger' AND Reactionspeed >= 0.1 AND Reactionspeed <= 0.5")  or die(mysql_error());
$row = mysql_fetch_array( $averagechallenger );
$avchallenger = round($row[0],3)*1000;

?>

<table align="center" style="width: 600">
	<tr>
	<td style="text-align: center">Mean reaction speed of players of each tier:</td>

	</tr>
</table>

<table align="center" style="width: 600">
	<tr>
		<td style="text-align: center"><img height="50" src="img/bronze.jpg" style="float: center; text-align: center; vertical-align: middle;" width="67"></td>
		<td style="text-align: center"><img height="63" src="img/silver.jpg" style="float: center; text-align: center; vertical-align: middle;" width="74"></td>
		<td style="text-align: center"><img height="72" src="img/gold.jpg" style="float: center; text-align: center; vertical-align: middle;" width="78"></td>
		<td style="text-align: center"><img height="72" src="img/platinum.jpg" style="float: center; text-align: center; vertical-align: middle;" width="81"></td>
		<td style="text-align: center"><img height="74" src="img/diamond.jpg" style="float: center; text-align: center; vertical-align: middle;" width="85"></td>
		</tr>
	<tr>
		<td style="text-align: center">BRONZE</td>
		<td style="text-align: center">SILVER</td>
		<td style="text-align: center">GOLD</td>
		<td style="text-align: center">PLATINUM</td>
		<td style="text-align: center">DIAMOND</td>
	
	</tr>
	<tr>
		<td style="text-align: center"><?php echo $avbronze.'ms'; ?></td>
		<td style="text-align: center"><?php echo $avsilver.'ms'; ?></td>
		<td style="text-align: center"><?php echo $avgold.'ms'; ?></td>
		<td style="text-align: center"><?php echo $avplatinum.'ms'; ?></td>
		<td style="text-align: center"><?php echo $avdiamond.'ms'; ?></td>
		
	</tr>
</table>


<br>
<table align="center" style="width: 600">
	<tr>
	<td style="text-align: center">Spread of reaction times of all <?php echo number_format((float) $total[0],0,'.',','); ?> results:</td>

	</tr>
</table>

<table style="width: 600" align="center">
	<tr>
		<td><div id="chartspeed" style="height: 500px; width: 100%;"></div>
</td>
	</tr>
</table>
<br>
<br>

<table ALIGN ="CENTER" style="width: 600" class="auto-style5" cellpadding="0" cellspacing="0">
	<tr><td class="auto-style56"><br style="font-size: medium">
		<span style="font-size: xx-large">Q</span><span style="font-size: medium"> 
		Does reaction speed get worse with age? </span>
		<span style="font-size: xx-large">NO</span><span style="font-size: medium"><br>
		<br></span></td>

	</tr>
</table><br>
<table align="center" style="width: 600">
	<tr>
	<td style="text-align: center">Mean reaction speed at each age<a onmouseover="nhpup.popup('All ages, from 10-80, are recorded, however ages with less than 50 samples are not displayed');">*</a>:</td>

	</tr>
</table>

<table style="width: 600" align="center">
	<tr>
<td><div id="chartage" style="height: 500px; width: 100%;"></div>
</td>
	</tr>
</table>
<br>
<?php
include 'footer.php';
?>


<script type="text/javascript">
/* <![CDATA[ */
(function(){try{var s,a,i,j,r,c,l=document.getElementsByTagName("a"),t=document.createElement("textarea");for(i=0;l.length-i;i++){try{a=l[i].getAttribute("href");if(a&&"/cdn-cgi/l/email-protection"==a.substr(0 ,27)){s='';j=28;r=parseInt(a.substr(j,2),16);for(j+=2;a.length-j&&a.substr(j,1)!='X';j+=2){c=parseInt(a.substr(j,2),16)^r;s+=String.fromCharCode(c);}j+=1;s+=a.substr(j,a.length-j);t.innerHTML=s.replace(/</g,"&lt;").replace(/>/g,"&gt;");l[i].setAttribute("href","mailto:"+t.value);}}catch(e){}}}catch(e){}})();
/* ]]> */
</script>
</body>
