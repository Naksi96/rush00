<?PHP
	if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === "OK")
	{
		if (!file_exists("../private"))
			mkdir("../private");
		if (!file_exists("../private/passwd"))
			file_put_contents("../private/passwd", NULL);
		$acc_info = unserialize(file_get_contents("../private/passwd"));
		$dup = FALSE;
		if ($acc_info)
		{
			foreach ($acc_info as $key=>$val)
			{
				if ($val['login'] === $_POST['login'])
					$dup = TRUE;
			}
		}
		if ($dup)
		{
			echo "ERROR\n";
			header('Location: create.html');
			exit();
		}
		else
		{
			$new_acc['login'] = $_POST['login'];
			$new_acc['passwd'] = hash("whirlpool", $_POST['passwd']);
			$new_acc['email'] = $_POST['email'];
			$new_acc['phone'] = $_POST['phone'];
			$new_acc['address'] = $_POST['address'];
			$acc_info[] = $new_acc;
			file_put_contents("../private/passwd", serialize($acc_info));
			echo "OK\n";
			header('Location: login.html');
			exit();
		}
	}
	else
	{
		echo "ERROR\n";
		header('Location: create.html');
		exit();
	}
?>