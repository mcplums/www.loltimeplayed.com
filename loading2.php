<?php

$summoner = $_GET["summoner"];
$region = $_GET["region"];
$age = $_GET["age"];

?>


<head>
 <title>Loltimeplayed.com</title>
 <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
<meta content="en-gb" http-equiv="Content-Language">
<meta name="description" content="League of Legends time played calculator. Ever wondered how long you've spent playing? In addition to calculating total time, Loltimeplayed.com calculates your elo earnt per hour and breaks down your time between queues, including normal games, ranked, ARAM, 3v3, Dominion- all games except custom are included.">
<meta name="keywords" content="Lol, League of legends, timeplayed, loltimeplayed,league calculator">
<meta name="indentifier-url" content="http://loltimeplayed.com" />
<meta name="robots" content="follow,index"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">

a {
	color:white
}


.auto-style7 {
	text-align: center;
}
.auto-style8 {
	font-size: xx-large;
	font-family: Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif;
}
.auto-style56 {
	text-align: center;
	color: #78C9F8;
	font-size: x-large;
	background-color: #005B96;
}
</style>
</head>






<body style="color: #FFFFFF; background-color: #000000">

<script>
if ("<?php echo $eph; ?>" === "yes")
//if ("yes" === "yes")
{
var destination = "reaction2.php?region=<?php echo $region; ?>&summoner=<?php echo $summoner; ?>&eph=yes";
}
else
{
var destination = "reaction2.php?region=<?php echo $region; ?>&summoner=<?php echo $summoner; ?>&age=<?php echo $age; ?>";
}
</script>
<br><br>
<br><br>


<table ALIGN ="CENTER" "style="width: 600px">
	<tr>
		<td class="auto-style7"><a href="http://www.loltimeplayed.com/">
		<img src="http://www.loltimeplayed.com/img/logo2.jpg" style="border-width: 0px"></a><br><br><br><br>

		</td>
	</tr>
</table>
<table ALIGN ="CENTER" style="width: 600" class="auto-style5" cellpadding="0" cellspacing="0">
	<tr>
		<td class="auto-style56">
		<div id="form" class="form_width" style="font-size: medium; color: #FFFFFF"><br>
			Please wait, contacting Riot API...<br>
			<img height="16" src="gif.gif" width="16"></div><br>
</td>
	</tr>
</table>


<br>
<?php
include 'footerloading.php';
?>


<script type="text/javascript">
            window.location.replace(destination);
        </script>

</body>
