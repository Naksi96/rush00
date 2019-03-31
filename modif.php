<?PHP
	if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && ($_POST['submit'] === "OK") && file_exists("../private/passwd"))
	{
		$acc_info = unserialize(file_get_contents("../private/passwd"));
		if ($acc_info)
		{
			$access_granted = 0;
			foreach ($acc_info as $acc=>$usr)
			{
				if (($usr['login'] === $_POST['login']) && ($usr['passwd'] === hash("whirlpool", $_POST['oldpw'])))
				{
					$acc_info[$acc]['passwd'] = hash("whirlpool", $_POST['newpw']);
					$access_granted = 1;
				}
			}
			if ($access_granted === 0)
			{
				echo "ERROR\n";
				header('Location: modif.html');
				exit();
			}
			else
			{
				file_put_contents("../private/passwd", serialize($acc_info));
				echo "OK\n";
				header('Location: acc_info.php');
				exit();
			}			
		}
		else
		{
			echo "ERROR\n";
			header('Location: modif.html');
			exit();
		}
	}
	else
	{
		echo "ERROR\n";
		header('Location: modif.html');
		exit();
	}
		
?>