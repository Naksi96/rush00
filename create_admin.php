<?PHP
	session_start();
	if (!file_exists("../private"))
		mkdir("../private");
	if (!file_exists("../private/ad_passwd"))
		file_put_contents("../private/ad_passwd", NULL);
	$acc_info = unserialize(file_get_contents("../private/ad_passwd"));
	$dup = FALSE;
	if ($acc_info)
	{
		foreach ($acc_info as $key=>$val)
		{
			if ($val['login'] === $_SESSION['loggued_on_user'])
				$dup = TRUE;
		}
	}
	if ($dup)
	{
		echo "ERROR\n";
		header('Location: acc_info.php');
		exit();
	}
	else
	{
		$new_acc['login'] = $_SESSION['loggued_on_user'];
		$acc_info[] = $new_acc;
		file_put_contents("../private/ad_passwd", serialize($acc_info));
		echo "OK\n";
		header('Location: acc_info.php');
		exit();
	}
?>