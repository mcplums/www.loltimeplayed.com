<?php

include 'header.php';

$summoner = $_POST["summoner"];
if(isset($summoner) && $summoner != "Summoner name...")
{
	$summoner = strtolower($summoner);
	$summoner = str_replace(' ','', $summoner);
	$region   = $_POST["region"];

		header( 'Location: http://www.loltimeplayed.com/loading.php?region='.$region.'&summoner='.$summoner.'' );
	

}


?>



<div class ="inputbox" >

	<br>
	<div class="form"><br>
		<form action="" method="post">
			<input  type="text" name="summoner" value="Summoner name..." onfocus="if(this.value == 'Summoner name...') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Summoner name...'; }"/>
			<select name="region">
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
			</select><br><br>
			<input class="submit" type="submit" name="submit" value="Calculate time played"/>
		</form>
	</div>
	<br>
</div>



<br>
<?php
include 'footer.php';
?>



</body>
