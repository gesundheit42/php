<?php
if ($_POST["login"] && $_POST["passwd"] && $_POST["submit"] == "OK")
{
	if (!file_exists('private'))
		mkdir("private");
	$account = unserialize(file_get_contents("private/passwd"));
	if ($account)
	{
		foreach ($account as $key)
		{
			if ($key['login'] == $_POST['login'])
			{
				echo "ERROR\n";
				exit (0);
			}
		}
	}
	$aux['login'] = $_POST['login'];
	$aux['passwd'] = hash('md5', $_POST['passwd']);
	$account[] = $aux;
	echo "OK";
	file_put_contents("private/passwd", serialize($account));
}
else
	echo "ERROR";
?>
