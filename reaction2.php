<?php session_start();
$summoner = $_GET["summoner"];
$region = $_GET["region"];
$age = $_GET["age"];

$originalsummoner = $summoner;
//$summoner = utf8_encode($summoner);


$jsonsmall = file_get_contents('https://'.$region.'.api.pvp.net/api/lol/'.$region.'/v1.4/summoner/by-name/'.$summoner.'?api_key=a7ce7ac9-5d2f-4ee3-8548-adfc3a81c8b0'); 
$arraysmall = json_decode($jsonsmall,true);


$simplearray = array();
$id= $arraysmall[$summoner]['id'];
$y=0;
if ($arraysmall[$summoner]['id'] > 0)

{

$json = file_get_contents('https://'.$region.'.api.pvp.net/api/lol/'.$region.'/v2.5/league/by-summoner/'.$arraysmall[$summoner]['id'].'/entry?api_key=a7ce7ac9-5d2f-4ee3-8548-adfc3a81c8b0');
$url = 'https://'.$region.'.api.pvp.net/api/lol/'.$region.'/v2.5/league/by-summoner/'.$arraysmall[$summoner]['id'].'/entry?api_key=a7ce7ac9-5d2f-4ee3-8548-adfc3a81c8b0';
$rankeddata = json_decode($json,true);
$elo=0;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$hello = curl_exec($ch);
$statuscode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 

if ($statuscode =='200')

{
	
$betterrankeddata = $rankeddata[$arraysmall[$summoner]['id']];

if ($arraysmall[$summoner]['id'] > 0)

{

foreach($betterrankeddata as $entry) {
  if($entry['queue'] == 'RANKED_SOLO_5x5') {
    $tier = $entry['tier'];
    $rank = $entry['entries'][0]['division'];
    $lp =  $entry['entries'][0]['leaguePoints'];
  }
}

}

}

mysql_connect("localhost", "wwwlolti_mcplums", "W965ds+-");
mysql_select_db("wwwlolti_goons");
mysql_query("REPLACE INTO Reactions (summoner, region, tier, division, summonerid, age) VALUES ('$summoner','$region', '$tier', '$rank', '$id', '$age')");  

if ($tier == 'BRONZE')
{ 
$elo = 1115;
}
if ($tier == 'SILVER')
{ 
$elo = 1115;
}
if ($tier == 'GOLD')
{ 
$elo = 1115;
}
if ($tier == 'PLATINUM')
{ 
$elo = 1115;
}
if ($tier == 'DIAMOND')
{ 
$elo = 1115;
}
if ($tier == 'MASTER')
{ 
$elo = 1115;
}
if ($tier == 'CHALLENGER')
{  $elo = 1115; }

}



?>

<html>
<head>
<title>Online Reaction Time Test</title>
<script language="Javascript"><!--
//global vars
var rt1 = 0;
var rt2 = 0;
var rt3 = 0;
var rt4 = 0;
var rt5 = 0;
var avg = 0;
var whichTest = "0";

//set up elements of the timer
var myTime = new Date();
var starTime = myTime.getTime();
var endTime = myTime.getTime();

//preload images
if (document.images){
img = new Array();
img[1]=new Image(); img[1].src="img/rttest_stoplight_yellow.gif";
img[2]=new Image(); img[2].src="img/rttest_stoplight_red.gif";
img[3]=new Image(); img[3].src="img/rttest_stoplight_green.gif";
img[4]=new Image(); img[4].src="img/rttest_wait.gif";
img[5]=new Image(); img[5].src="img/rttest_ready.gif";
img[6]=new Image(); img[6].src="img/rttest_go.gif";
img[7]=new Image(); img[7].src="img/rttest_done.gif";
img[8]=new Image(); img[8].src="img/rttest_continue.gif";
}

//starts from the top
function startOver(){
whichTest = "0";
document.jensen.src = img[4].src;
document.stoplight.src = img[1].src;
rt1 = 0;
rt2 = 0;
rt3 = 0;
rt4 = 0;
rt5 = 0;
avg = 0;
document.rttest.test1.value = "";
document.rttest.test2.value = "";
document.rttest.test3.value = "";
document.rttest.test4.value = "";
document.rttest.test5.value = "";
document.rttest.avg.value = "";
atimer = setTimeout("test1SetUp()",2000);
}

function test1SetUp(){
document.jensen.src = img[5].src;
whichTest = "1a";
}

function test1DoIt(){
whichTest="0";
document.stoplight.src = img[2].src;
document.jensen.src = img[6].src;
btimer = setTimeout("whichTest = '1b'; lightGreen()",(Math.random()*3000) + 3000);
}

function test1Recap(){
whichTest="0";
myTime = new Date();
endTime = myTime.getTime();
document.jensen.src = img[4].src;
document.stoplight.src = img[1].src;
rt1 = (endTime - starTime)/1000;
if (rt1 < 0.1)
{
    alert("It is not possible to get that time without either cheating or being Korean. Test will reset.");
    startOver();
}
else
{
document.rttest.test1.value = rt1.toString();
//document.rttest.avg.value = rt1.toString();
ctimer = setTimeout("test2SetUp()",2000);
}
}

function test2SetUp(){
document.jensen.src = img[8].src;
whichTest = "2a";
}

function test2DoIt(){
whichTest="0";
document.stoplight.src = img[2].src;
document.jensen.src = img[6].src;
btimer = setTimeout("whichTest = '2b'; lightGreen()",(Math.random()*4500) + 2500);
}

function test2Recap(){
whichTest="0";
myTime = new Date();
endTime = myTime.getTime();
document.jensen.src = img[4].src;
document.stoplight.src = img[1].src;
rt2 = (endTime - starTime)/1000;
if (rt2 < 0.1)
{
    alert("It is not possible to get that time without either cheating or being Korean. Test will reset.");
    startOver();
}
else
{
document.rttest.test2.value = rt2.toString();
document.rttest.avg.value = (rt2)/1;
ctimer = setTimeout("test3SetUp()",2000);
}
}

function test3SetUp(){
document.jensen.src = img[8].src;
whichTest = "3a";
}

function test3DoIt(){
whichTest="0";
document.stoplight.src = img[2].src;
document.jensen.src = img[6].src;
btimer = setTimeout("whichTest = '3b'; lightGreen()",(Math.random()*4500) + 2500);
}

function test3Recap(){
whichTest="0";
myTime = new Date();
endTime = myTime.getTime();
document.jensen.src = img[4].src;
document.stoplight.src = img[1].src;
rt3 = (endTime - starTime)/1000;
if (rt3 < 0.1)
{
    
    alert("It is not possible to get that time without either cheating or being Korean. Test will reset.");
    startOver();
}
else
{
document.rttest.test3.value = rt3.toString();
document.rttest.avg.value = (rt2 + rt3)/2;
ctimer = setTimeout("test4SetUp()",2000);
}
}

function test4SetUp(){
document.jensen.src = img[8].src;
whichTest = "4a";
}

function test4DoIt(){
whichTest="0";
document.stoplight.src = img[2].src;
document.jensen.src = img[6].src;
btimer = setTimeout("whichTest = '4b'; lightGreen()",(Math.random()*4500) + 2500);
}

function test4Recap(){
whichTest="0";
myTime = new Date();
endTime = myTime.getTime();
document.jensen.src = img[4].src;
document.stoplight.src = img[1].src;
rt4 = (endTime - starTime)/1000;
if (rt4 < 0.1)
{
    alert("It is not possible to get that time without either cheating or being Korean. Test will reset.");
    startOver();
}
else
{
document.rttest.test4.value = rt4.toString();
document.rttest.avg.value = (rt2 + rt3 + rt4)/3;
ctimer = setTimeout("test5SetUp()",2000);
}
}

function test5SetUp(){
document.jensen.src = img[8].src;
whichTest = "5a";
}

function test5DoIt(){
whichTest="0";
document.stoplight.src = img[2].src;
document.jensen.src = img[6].src;
btimer = setTimeout("whichTest = '5b'; lightGreen()",(Math.random()*4500) + 2500);
}

function test5Recap(){
whichTest="0";
myTime = new Date();
endTime = myTime.getTime();
document.jensen.src = img[7].src;
document.stoplight.src = img[1].src;
rt5 = (endTime - starTime)/1000;
if (rt5 < 0.1)
{
    alert("It is not possible to get that time without either cheating or being Korean. Test will reset.");
    startOver();
}
else
{
document.rttest.test5.value = rt5.toString();
document.rttest.avg.value = (rt2 + rt3 + rt4 + rt5)/4;
var average = (rt2 + rt3 + rt4 + rt5)/4;
var encryptedaverage = (average * 55000);
etimer = setTimeout("whichTest='6'",3000);
alert("Your average reaction speed was "+average+" seconds. Click OK to see the results page.")
document.write('<form name="coon" action="reactionresults.php" method="POST">');
document.write('<input type="hidden" name="id" value="<?php echo $id; ?>">');
document.write('<input type="hidden" name="hash" value="'+encryptedaverage+'">');
document.write('</form>');
submitform();

//var destination = "/reactionresults.php?id=<?php echo $id; ?>&hash="+encryptedaverage;
//window.location.replace(destination);
}
}

function submitform()
        {
            document.forms["coon"].submit();
        }

//this function set off by either a mousedown or keypress
function buttClicked(){
if (whichTest == "1b"){test1Recap()}else{}
if (whichTest == "2b"){test2Recap()}else{}
if (whichTest == "3b"){test3Recap()}else{}
if (whichTest == "4b"){test4Recap()}else{}
if (whichTest == "5b"){test5Recap()}else{}

if (whichTest == "1a"){test1DoIt()}else{}
if (whichTest == "2a"){test2DoIt()}else{}
if (whichTest == "3a"){test3DoIt()}else{}
if (whichTest == "4a"){test4DoIt()}else{}
if (whichTest == "5a"){test5DoIt()}else{}
if (whichTest == "6"){startOver()}else{}
}

//turn the light green and setup to wait for the click or keypress
function lightGreen(){
document.stoplight.src = img[3].src;
myTime = new Date();
starTime = myTime.getTime();
}

//opens the see-the-code popup
function popup(){
see=window.open('thecode/rttest_code.html','codewind','scrollbars,resizable,width=635,height=250')
see.focus()
}

//event capture for Netscape, keypresses captured
//see the second half of this function at the bottom of html body
function whichKey(e){
buttClicked();
}
//-->
</script>

<style>
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

<body style="color: #FFFFFF; background-color: #000000" topmargin="0" marginheight="0" onload="startOver();" onkeypress="buttClicked();return false">

<br><br>

<br><br>
<table ALIGN ="CENTER" "style="width: 600px">
	<tr>
		<td class="auto-style7"><a href="http://www.loltimeplayed.com/">
		<img src="http://www.loltimeplayed.com/img/logo2.jpg" style="border-width: 0px"></a><br><br><br><br>

		</td>
	</tr>
</table>

<?php


if ($arraysmall[$summoner]['id'] > 0)
    
{
if ($elo == 1115)
{
echo '<table ALIGN ="CENTER" style="width: 500" class="auto-style5" cellpadding="0" cellspacing="0">
	<tr><td class="auto-style56"><strong><br>You are in '.$tier.' '.$rank.'</strong><br></td>

	</tr>
</table><br>';
}
else
{
  echo '<table ALIGN ="CENTER" style="width: 500" class="auto-style5" cellpadding="0" cellspacing="0">
	<tr><td class="auto-style56"><strong><br>You are not currently ranked.</strong><br></td>

	</tr>
</table><br>';  
}
}
else
{
echo '<table ALIGN ="CENTER" style="width: 500" class="auto-style5" cellpadding="0" cellspacing="0">
	<tr><td class="auto-style56"><strong><br>Summoner '.$originalsummoner.' ('.$region.') not found</strong></td>

	</tr>
</table>';
}


?>
<table ALIGN ="CENTER" style="width: 500" class="auto-style5" cellpadding="0" cellspacing="0">
	<tr><td class="auto-style56"><br style="font-size: medium">
		<span style="font-size: medium">Click on the button to start. When the traffic light goes green click it again. Repeat five times to get an average score. Your result will automatically be submitted after 5 attempts. The first score is for practice only and is not counted towards your average score.<br>
		<br><strong>Refresh this page to reset your scores. <br></strong>
		</span></td>

	</tr>
</table><br>
<form name="rttest">
<table  class="auto-style56" border="1" width="500" cellpadding="5" cellspacing="1" bgcolor="#ffffff" align="center">
	<tr>
		<td>Test<br>Number</td>
		<td>Reaction<br>Time (in seconds)</td>
		<td><center>The stoplight<br>to watch.</center></td>
		<td><center>The button<br>to click.</center></td>
	</tr>
	<tr>
		<td><center>1 (practice)</center></td>
		<td><input type="text" size="15" name="test1"></td>
		<td rowspan="6"><center><img src="img/rttest_stoplight_yellow.gif" name="stoplight" width="72" height="144" border="0"></center></td>
		<td rowspan="6"><center><a href="#" onmousedown="buttClicked();return false" onclick="return false"><img src="img/rttest_wait.gif" name="jensen" width="72" height="144" border="0"></a></center></td>
	</tr>
	<tr>
		<td><center>2</center></td>
		<td><input type="text" size="15" name="test2"></td>
	</tr>
	<tr>
		<td><center>3</center></td>
		<td><input type="text" size="15" name="test3"></td>
	</tr>
	<tr>
		<td><center>4</center></td>
		<td><input type="text" size="15" name="test4"></td>
	</tr>
	<tr>
		<td><center>5</center></td>
		<td><input type="text" size="15" name="test5"></td>
	</tr>
	<tr>
		<td><center>AVG.</center></td>
		<td><input type="text" size="15" name="avg"></td>
	</tr>
       
	
</table>
</form>
<br><br>
<center>The Online Reaction Time Test, © 2002 by Jim Allen, gywh.com</center>
<br>

<br>

<script language="javascript"><!-- 
//Prepare to capture keypress events in netscape 4.
// (IE and other - keypress capture is set up in body statement)
//this is part 2 of a function in the head section
if (document.layers){
document.captureEvents(Event.KEYPRESS);
document.onkeypress=whichKey;
}else{}

//-->
</script>
<br><br>

<!-- googlebug for getyourwebsitehere.com -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-25962483-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


</body>
</html>
