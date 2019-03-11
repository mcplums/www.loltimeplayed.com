<?php
echo 'peen';
 mysql_connect("localhost", "wwwlolti_mcplums", "W965ds+-");
 mysql_select_db("wwwlolti_goons");
 $Goons = mysql_query("SELECT * FROM Goons") or die(mysql_error());
 $averagebronze = mysql_query("SELECT AVG(Hours) FROM Goons WHERE Tier='BRONZE'") or die(mysql_error());
 $averagesilver = mysql_query("SELECT AVG(Hours) FROM Goons WHERE Tier='SILVER'") or die(mysql_error());
 $averagegold = mysql_query("SELECT AVG(Hours) FROM Goons WHERE Tier='GOLD'") or die(mysql_error());
 $averageplatinum = mysql_query("SELECT AVG(Hours) FROM Goons WHERE Tier='PLATINUM'") or die(mysql_error());
 $averagediamond = mysql_query("SELECT AVG(Hours) FROM Goons WHERE Tier='DIAMOND'") or die(mysql_error());
 $averagechallenger = mysql_query("SELECT AVG(Hours) FROM Goons WHERE Tier='CHALLENGER'") or die(mysql_error());
 
 $bronzecount = mysql_query("SELECT COUNT(*) FROM Goons WHERE Tier='BRONZE'") or die(mysql_error());
 $silvercount = mysql_query("SELECT COUNT(*) FROM Goons WHERE Tier='SILVER'") or die(mysql_error());
 $goldcount = mysql_query("SELECT COUNT(*) FROM Goons WHERE Tier='GOLD'") or die(mysql_error());
 $platinumcount = mysql_query("SELECT COUNT(*) FROM Goons WHERE Tier='PLATINUM'") or die(mysql_error());
 $diamondcount = mysql_query("SELECT COUNT(*) FROM Goons WHERE Tier='DIAMOND'") or die(mysql_error());
 $challengercount = mysql_query("SELECT COUNT(*) FROM Goons WHERE Tier='CHALLENGER'") or die(mysql_error());
 echo 'peen';
 
 $avbronze = mysql_fetch_row($averagebronze);
 $avsilver = mysql_fetch_row($averagesilver);
 $avgold = mysql_fetch_row($averagegold);
 $avplatinum = mysql_fetch_row($averageplatinum);
 $avdiamond = mysql_fetch_row($averagediamond);
 $avchallenger = mysql_fetch_row($averagechallenger);
 
 $bronzecnt = mysql_fetch_row($bronzecount);
 $silvercnt = mysql_fetch_row($silvercount);
 $goldcnt = mysql_fetch_row($goldcount);
 $platinumcnt = mysql_fetch_row($platinumcount);
 $diamondcnt = mysql_fetch_row($diamondcount);
 $challengercnt = mysql_fetch_row($challengercount);
 $total = $bronzecnt[0] + $silvercnt[0] + $goldcnt[0] + $platinumcnt[0] + $diamondcnt[0] + $challengercnt[0];

 mysql_query("UPDATE Averages SET Summoners = $bronzecnt[0], Averagehours = $avbronze[0] WHERE Tier = 'Bronze'");
 mysql_query("UPDATE Averages SET Summoners = $silvercnt[0], Averagehours = $avsilver[0] WHERE Tier = 'Silver'");
 mysql_query("UPDATE Averages SET Summoners = $goldcnt[0], Averagehours = $avgold[0] WHERE Tier = 'Gold'");
 mysql_query("UPDATE Averages SET Summoners = $platinumcnt[0], Averagehours = $avplatinum[0] WHERE Tier = 'Platinum'");
 mysql_query("UPDATE Averages SET Summoners = $diamondcnt[0], Averagehours = $avdiamond[0] WHERE Tier = 'Diamond'");
 mysql_query("UPDATE Averages SET Summoners = $challengercnt[0], Averagehours = $avchallenger[0] WHERE Tier = 'Challenger'");
 
 mysql_query("UPDATE Averages SET Summoners = $total WHERE Tier = 'Total'");
 



?>

