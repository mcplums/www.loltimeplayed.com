<?php
$region = $_GET["region"];
mysql_connect("localhost", "wwwlolti_mcplums", "W965ds+-");
mysql_select_db("wwwlolti_goons");
$top100 = mysql_query("SELECT * FROM Goons WHERE Region='$region' ORDER BY Hours DESC LIMIT 100") or die(mysql_error());
$ts = mysql_query("SELECT COUNT(Hours) FROM Goons") or die(mysql_error());
$totalsummoners = mysql_fetch_row($ts);
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

.auto-style4 {
	text-align: center;
	background-color: #0072BC;
	color: #FFFFFF;
	font-size: medium;
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
	background-color: #005B96;
}

.auto-style57 {
	text-align: center;
	color: #78C9F8;
	background-color: #005B96;
	font-size: x-large;
}

.auto-style6 {
	text-align: center;
	color: #FFFFFF;
	
	background-color: #005B96;
}

</style>
</head>






<body style="color: #FFFFFF; background-color: #000000">


<table ALIGN ="CENTER" "style="width: 600px">
	<tr>
		<td class="auto-style7"><img height="278" src="http://www.loltimeplayed.com/img/logo.jpg" width="399"><br>
		<span class="auto-style8">LOLTIMEPLAYED.COM</span></td>
	</tr>
</table>

<table ALIGN ="CENTER" style="width: 750" class="auto-style56" cellpadding="0" cellspacing="0"><tr>
<td style="width: 50px" class="auto-style57"><strong>Top 100 Most Addicted Summoners<br>  </strong><br></td></tr></table>
<?php
echo '<table ALIGN ="CENTER" style="width: 750" class="auto-style56" cellpadding="0" cellspacing="0"><tr>
<td style="width: 650px" class="auto-style56">Of the '.number_format((float) $totalsummoners[0],0,'.',',').' summoners to have used this site, the top 100 most addicted are listed below</td></tr></table>';
echo '<table ALIGN ="CENTER" style="width: 750" class="auto-style56" cellpadding="0" cellspacing="0"><tr>
		<td style="width: 150px" class="auto-style2"></td>
		<td style="width: 150px" class="auto-style6">Days</td>
		<td style="width: 150px" class="auto-style6">Summoner</td>
		<td style="width: 150px" class="auto-style6">Region</td>
		<td style="width: 150px" class="auto-style6">Tier</td></tr>';
$i=0;
while ($row = mysql_fetch_array( $top100 ))
{
$i++;	

$region = strtoupper($region);
$days=number_format((float) $row[Hours]/24,1,'.',',');
if (strlen($row[Tier])<2) {$row[Tier]= 'Unranked';}
echo '<tr><td style="width: 150px" class="auto-style4">'.$i.'</td>
		<td style="width: 150px" class="auto-style4">'.$days.'</td>
		<td style="width: 150px" class="auto-style4"><a href="timeplayed.php?region='.$row[Region].'&summoner='.$row[Summoner].'">'.$row[Summoner].'</a></td>
		<td style="width: 150px" class="auto-style4">'.$row[Region].'</td>
		<td style="width: 150px" class="auto-style4">'.$row[Tier].' '.$row[Division].'</td></tr>';	

}


		?>
</table>
<br>
<table ALIGN ="CENTER" style="width: 500" cellpadding="0" cellspacing="0">
	<tr><td style="text-align: center; font-size: smaller;"><strong>
		<a href="donate.html" style="text-decoration: none">Donate</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="http://www.cloudflare.com/email-protection#0169646d6d6e416d6e6d75686c64716d607864652f626e6c" style="text-decoration: none">
		Contact</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="jungle.htm" style="text-decoration: none">Jungle Timer</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="http://www.drewsreviews.org.uk/" style="text-decoration: none">
		OP unrelated movie review site</a></strong></td></strong></td>

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
(function(){try{var s,a,i,j,r,c,l=document.getElementsByTagName("a"),t=document.createElement("textarea");for(i=0;l.length-i;i++){try{a=l[i].getAttribute("href");if(a&&"www.cloudflare.com/email-protection"==a.substr(7 ,35)){s='';j=43;r=parseInt(a.substr(j,2),16);for(j+=2;a.length-j&&a.substr(j,1)!='X';j+=2){c=parseInt(a.substr(j,2),16)^r;s+=String.fromCharCode(c);}j+=1;s+=a.substr(j,a.length-j);t.innerHTML=s.replace(/</g,"&lt;").replace(/>/g,"&gt;");l[i].setAttribute("href","mailto:"+t.value);}}catch(e){}}}catch(e){}})();
/* ]]> */
</script>
</body>
