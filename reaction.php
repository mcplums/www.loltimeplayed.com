<?php





$summoner = $_POST["summoner"];
if (isset($summoner)  && $summoner != "Summoner name...") 
{
$summoner = strtolower($summoner); 
$summoner = str_replace(' ','', $summoner);
$region = $_POST["region"];
$age = $_POST["age"];
header( 'Location: /loading2.php?region='.$region.'&summoner='.$summoner.'&age='.$age );
}


?>


<head>
 <title>Loltimeplayed.com</title>
 <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
<meta content="en-gb" http-equiv="Content-Language">
<meta name="description" content="How does your reaction time compare to the average lol player?">
<meta name="keywords" content="Lol, League of legends, timeplayed, loltimeplayed,league calculator">
<meta name="indentifier-url" content="http://loltimeplayed.com" />
<meta name="robots" content="follow,index"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles.css">

<style type="text/css">

a {
	color:white
}


.auto-style7 {
	text-align: center;
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
		<td class="auto-style56"><div id="form" class="form_width"><strong>&nbsp;Reaction speed test</strong><br>
			<form action="" method="post">
			  <input class="input" style="" type="text" name="summoner" id="pseudo" value="Summoner name..." onfocus="if(this.value == 'Summoner name...') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Summoner name...'; }"/>
			  <select name="region" class="select">
				<option value="euw">euw</option>
				<option value="na">na</option>
				<option value="eune">eune</option>
				<option value="br">br</option>
				<option value="lan">lan</option>
				<option value="las">las</option>
				<option value="oce">oce</option>
				<option value="ru">ru</option>
				<option value="tr">tr</option>
				<option value="kr">kr</option>
			  </select>
			  <input class="input" type="text" name="age" id="pseudo0" value="Enter age..." onfocus="if(this.value == 'Enter age...') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Enter age...'; }"/><br>
			  <input class="submit" type="submit" name="submit" value="Next"/>
			</form>
		  </div><span style="font-size: medium">
		<a href="reactionresults.php">Or go straight to the results<br>
</a></span><br>
</td>
	</tr>
</table>


<br>
<?php
include 'footer.php';
?>


</body>
