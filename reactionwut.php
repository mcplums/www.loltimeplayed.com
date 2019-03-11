
<?php

$id = $_GET["id"];

if (isset($id))
{
$encryptedaverage = $_GET["hash"];
$average = (($encryptedaverage / 55000));

 
}

?>


<html>
<head>
<title></title>
<meta name="" content="">
</head>
<body>

<script type="text/javascript">
        function submitform()
        {
            document.forms["coon"].submit();
        }
        </script>

<form name="coon" action="reactionresults.php" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="time" value="<?php echo $average; ?>">
</form>

<script type="text/javascript">


  submitform();

</script>

</body>
</html>