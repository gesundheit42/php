<?php
if ($_POST["login"] && $_POST["oldpw"] && $_POST["newpw"] && $_POST["submit"] == "OK")
{
	$account = unserialize(file_get_contents("../ex01/private/passwd"));
	if ($account)
	{
		foreach ($account as $key => $value)
		{
			if ($value['login'] == $_POST['login'] && $value['passwd'] == hash("md5", $_POST['oldpw']))
				$account[$key]['passwd'] = hash("md5", $_POST['newpw']);
		}
	}
	echo "OK";
	file_put_contents("../ex01/private/passwd", serialize($account));
}
else
	echo "ERROR";
?>
