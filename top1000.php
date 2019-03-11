<?php
include 'header.php';
include 'dbconnect.php';
$top100 = mysql_query("SELECT * FROM Top100 ORDER BY Hours DESC LIMIT 1000") or die(mysql_error());
$ts = mysql_query("SELECT COUNT(Hours) FROM Top100") or die(mysql_error());
$totalsummoners = mysql_fetch_row($ts);
mysql_close();
?>




<div class="top1000title">
<div class="top1000titletext">Top 1000 Most Addicted Summoners</div><br>
<div class="top1000tabletitle"></div>	
<div class="top1000tabletitle">Days</div>	
<div class="top1000tabletitle">Summoner</div>
<div class="top1000tabletitle">Region</div>
<div class="top1000tabletitle">Tier</div>
</div>

<?php


$i=0;
while ($row = mysql_fetch_array( $top100 ))
{
$i++;	

$region = strtoupper($region);
$days=number_format((float) $row[Hours]/24,1,'.',',');
if (strlen($row[Tier])<2) {$row[Tier]= 'Unranked';}
echo '
<div class="top1000tablebody">
<div class="top1000tabletext">'.$i.'</div>	
<div class="top1000tabletext">'.$days.'</div>	
<div class="top1000tabletext"><a href="loading.php?region='.$row[Region].'&summoner='.$row[Summoner].'">'.$row[Summoner].'</a></div>
<div class="top1000tabletext">'.$row[Region].'</div>
<div class="top1000tabletext">'.$row[Tier].' '.$row[Division].'</div>
</div>';

}



?>
<br>
<?php
include 'footer.php';
?>



<!--<script type="text/javascript">
/* <![CDATA[ */
(function(){try{var s,a,i,j,r,c,l=document.getElementsByTagName("a"),t=document.createElement("textarea");for(i=0;l.length-i;i++){try{a=l[i].getAttribute("href");if(a&&"www.cloudflare.com/email-protection"==a.substr(7 ,35)){s='';j=43;r=parseInt(a.substr(j,2),16);for(j+=2;a.length-j&&a.substr(j,1)!='X';j+=2){c=parseInt(a.substr(j,2),16)^r;s+=String.fromCharCode(c);}j+=1;s+=a.substr(j,a.length-j);t.innerHTML=s.replace(/</g,"&lt;").replace(/>/g,"&gt;");l[i].setAttribute("href","mailto:"+t.value);}}catch(e){}}}catch(e){}})();
/* ]]> */
</script>-->
</body>
