 <?php

//Database
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (strpos($actual_link,'localhost') !== false)
{
mysql_connect("localhost", "root", "");
mysql_select_db("loltimeplayed");
}
else{
mysql_connect("localhost", "wwwlolti_mcplums", "W965ds+-");
mysql_select_db("wwwlolti_goons");
}


















?>