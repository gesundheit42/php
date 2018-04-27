<?php
session_start();
if ($_POST['login'] != "" && $_POST['passwd'] != "")
{
if ($_POST["login"] && $_POST["passwd"] && $_POST["submit"] == "OK")
{
	include 'auth.php';
	if (auth($_POST["login"], $_POST["passwd"]))
	{
		$_SESSION["login"] = $_POST["login"];
		$_SESSION["passwd"] = hash("md5", $_POST["passwd"]);
		echo "OK";
	}
	else
		echo "ERROR";
}
else
	echo "ERROR\n";
}
?>
<html>
<head>
<style>
p
{
	margin-right: 15px;
}
</style>
<body>

<form action="login.php" method="POST">
	<p style="display:inline">login:</p>
	<input type="text" name="login" value="" />
	<br>
	passwd:
	<input type="text" name="passwd" value="" />
	<br><br>
	<input type="submit" name="submit" value="OK" />
</form>

</body>
</html>
