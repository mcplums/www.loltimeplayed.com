<?php
include 'header.php';

$summoner = $_GET["summoner"];
$region = $_GET["region"];

?>




<script>
var destination = "timeplayed.php?region=<?php echo $region; ?>&summoner=<?php echo $summoner; ?>";
</script>

<div class ="loadingbox" >
		<div id="form" class="form_width" style="font-size: medium; color: #FFFFFF"><br>
			Please wait, contacting Riot API...<br>
			<img height="16" src="gif.gif" width="16"></div><br>
</div>


<br>
<?php
//include 'footerloading.php';
?>


<script type="text/javascript">
            window.location.replace(destination);
        </script>

</body>
