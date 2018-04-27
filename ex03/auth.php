<?php
function	auth($login, $passwd)
{
	$account = unserialize(file_get_contents("../ex01/private/passwd"));
	if ($account)
	{
		foreach ($account as $value)
			if ($value["login"] == $login && $value["passwd"] == hash("md5", $passwd))
				return (TRUE);
	}
	return (FALSE);
}
?>
