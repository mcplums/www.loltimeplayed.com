<?php

mysql_connect("localhost", "wwwlolti_mcplums", "W965ds+-");
mysql_select_db("wwwlolti_goons");
/*$averagestable = mysql_query("SELECT * FROM Averages") or die(mysql_error());
//$averagebronze = mysql_query("SELECT AVG(Hours) FROM Goons WHERE Tier='BRONZE'") or die(mysql_error());
while($data = mysql_fetch_array($averagestable)) {
  //will output all data on each loop.
  var_dump($data);
}
print_r($data);
echo '<br><br>';
*/

$averagebronze = mysql_query("SELECT * FROM Averages WHERE Tier='BRONZE'") or die(mysql_error());
$avbronze = mysql_fetch_row($averagebronze);
$averagesilver = mysql_query("SELECT * FROM Averages WHERE Tier='SILVER'") or die(mysql_error());
$avsilver = mysql_fetch_row($averagesilver);
$averagegold = mysql_query("SELECT * FROM Averages WHERE Tier='GOLD'") or die(mysql_error());
$avgold = mysql_fetch_row($averagegold);
$averageplatinum = mysql_query("SELECT * FROM Averages WHERE Tier='PLATINUM'") or die(mysql_error());
$avplatinum = mysql_fetch_row($averageplatinum);
$averagediamond = mysql_query("SELECT * FROM Averages WHERE Tier='DIAMOND'") or die(mysql_error());
$avdiamond = mysql_fetch_row($averagediamond);
$averagechallenger = mysql_query("SELECT * FROM Averages WHERE Tier='CHALLENGER'") or die(mysql_error());
$avchallenger = mysql_fetch_row($averagechallenger);
$total = mysql_query("SELECT * FROM Averages WHERE Tier='Total'") or die(mysql_error());
$totalpls = mysql_fetch_row($total);




?>

<head>
 <title>Loltimeplayed.com</title>
 <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
<meta content="en-gb" http-equiv="Content-Language">
<meta name="description" content="League of Legends time played calculator">
<meta name="keywords" content="Lol, League of legends, timeplayed, loltimeplayed,league calculator">
<meta name="indentifier-url" content="http://loltimeplayed.com" />
<meta name="robots" content="follow,index"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">

a {
	color:white
}

.auto-style2 {
	text-align: center;
	background-color: #005B96;
}
.auto-style4 {
	text-align: center;
	background-color: #0072BC;
}
.auto-style6 {
	text-align: center;
	color: #FFFFFF;
	font-size: medium;
	background-color: #005B96;
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
	<tr><td class="auto-style56"><strong>Average hours played per tier<br><br>
		</strong>
		<span style="color: rgb(120, 201, 248); font-family: 'Times New Roman'; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: center; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(0, 91, 150);">
		Of the <?php echo number_format((float) $totalpls[0],0,'.',','); ?> ranked summoners across all regions to have used this site, the average total 
		playtime of summoners currently at each tier is listed. Updated every 30 minutes.<br> 
		<br> </span></td></tr><br>
</table><table ALIGN ="CENTER" style="width: 600" class="auto-style5" cellpadding="0" cellspacing="0"><tr><td style="width: 326px" class="auto-style2">
	&nbsp;</td>
		<td style="width: 198px" class="auto-style6"><strong># OF SUMMONERS </strong></td>
		<td style="width: 354px" class="auto-style6"><strong>AVERAGE PLAY TIME 
		(HRS)</strong></td>
		<td style="width: 302px" class="auto-style6"><strong>AVERAGE PLAY TIME 
		(DAYS)</strong></td></tr><tr>
		<td style="width: 326px" class="auto-style4"><strong>BRONZE</strong></td>
		<td style="width: 198px" class="auto-style4"><?php echo number_format((float) $avbronze[0],0,'.',','); ?></td>
		<td style="width: 354px" class="auto-style4"><?php echo number_format((float) $avbronze[1],0,'.',','); ?></td>
		<td style="width: 302px" class="auto-style4"><?php echo number_format((float) ($avbronze[1]/24),1,'.',','); ?></td>
		</tr><tr>
		<td style="width: 326px" class="auto-style4"><strong>SILVER</strong></td>
		<td style="width: 198px" class="auto-style4"><?php echo number_format((float) $avsilver[0],0,'.',','); ?></td>
		<td style="width: 354px" class="auto-style4"><?php echo number_format((float) $avsilver[1],0,'.',','); ?></td>
		<td style="width: 302px" class="auto-style4"><?php echo number_format((float) ($avsilver[1]/24),1,'.',','); ?></td>
		</tr><tr>
		<td style="width: 326px" class="auto-style4"><strong>GOLD</strong></td>
		<td style="width: 198px" class="auto-style4"><?php echo number_format((float) $avgold[0],0,'.',','); ?></td>
		<td style="width: 354px" class="auto-style4"><?php echo number_format((float) $avgold[1],0,'.',','); ?></td>
		<td style="width: 302px" class="auto-style4"><?php echo number_format((float) ($avgold[1]/24),1,'.',','); ?></td>
		</tr><tr>
		<td style="width: 326px" class="auto-style4"><strong>PLATINUM</strong></td>
		<td style="width: 198px" class="auto-style4"><?php echo number_format((float) $avplatinum[0],0,'.',','); ?></td>
		<td style="width: 354px" class="auto-style4"><?php echo number_format((float) $avplatinum[1],0,'.',','); ?></td>
		<td style="width: 302px" class="auto-style4"><?php echo number_format((float) ($avplatinum[1]/24),1,'.',','); ?></td>
		</tr><tr>
		<td style="width: 326px" class="auto-style4"><strong>DIAMOND</strong></td>
		<td style="width: 198px" class="auto-style4"><?php echo number_format((float) $avdiamond[0],0,'.',','); ?></td>
		<td style="width: 354px" class="auto-style4"><?php echo number_format((float) $avdiamond[1],0,'.',','); ?></td>
		<td style="width: 302px" class="auto-style4"><?php echo number_format((float) ($avdiamond[1]/24),1,'.',','); ?></td>
		</tr><tr>
		<td style="width: 326px" class="auto-style4"><strong>CHALLENGER</strong></td>
		<td style="width: 198px" class="auto-style4"><?php echo number_format((float) $avchallenger[0],0,'.',','); ?></td>
		<td style="width: 354px" class="auto-style4"><?php echo number_format((float) $avchallenger[1],0,'.',','); ?></td>
		<td style="width: 302px" class="auto-style4"><?php echo number_format((float) ($avchallenger[1]/24),1,'.',','); ?></td>
		</tr></table>
<br>
<table ALIGN ="CENTER" style="width: 800" cellpadding="0" cellspacing="0">
	<tr><td style="text-align: center; font-size: smaller;"><strong>
	<a href="top500.php" style="text-decoration: none">Top 500 Addicted 
		Summoners</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="donate.html" style="text-decoration: none">Donate</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="/cdn-cgi/l/email-protection#c1a9a4adadae81adaeadb5a8aca4b1ada0b8a4a5efa2aeac" style="text-decoration: none">
		Contact</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="jungle.htm" style="text-decoration: none">Jungle Timer</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="http://www.drewsreviews.org.uk/" style="text-decoration: none">
		OP unrelated movie review site</a></strong></td>

	</tr>
</table>
<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=9784352; 
var sc_invisible=1; 
var sc_security="7fb385f5"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="hits counter"
href="http://statcounter.com/free-hit-counter/"
target="_blank"><img class="statcounter"
src="http://c.statcounter.com/9784352/0/7fb385f5/1/"
alt="hits counter"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->



<script type="text/javascript">
/* <![CDATA[ */
(function(){try{var s,a,i,j,r,c,l=document.getElementsByTagName("a"),t=document.createElement("textarea");for(i=0;l.length-i;i++){try{a=l[i].getAttribute("href");if(a&&"/cdn-cgi/l/email-protection"==a.substr(0 ,27)){s='';j=28;r=parseInt(a.substr(j,2),16);for(j+=2;a.length-j&&a.substr(j,1)!='X';j+=2){c=parseInt(a.substr(j,2),16)^r;s+=String.fromCharCode(c);}j+=1;s+=a.substr(j,a.length-j);t.innerHTML=s.replace(/</g,"&lt;").replace(/>/g,"&gt;");l[i].setAttribute("href","mailto:"+t.value);}}catch(e){}}}catch(e){}})();
/* ]]> */
</script>
</body>


