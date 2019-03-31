<?PHP
    require_once('auth.php');
    session_start();
    if (!($_POST['login'] && $_POST['passwd'] && auth($_POST['login'], $_POST['passwd']) && $_SESSION['loggued_on_user'] === $_POST['login']))
    {
        echo "ERROR\n";
        header('Location: delete.html');
    }
    else
    {
        $acc_info = unserialize(file_get_contents("../private/passwd"));
        $ad_acc_info = unserialize(file_get_contents("../private/ad_passwd"));
        if ($ad_acc_info)
		{
			foreach ($ad_acc_info as $key=>$val)
			{
				if ($val['login'] === $_POST['login'])
					unset($ad_acc_info[$key]);
			}
		}
        if ($acc_info)
		{
			foreach ($acc_info as $key=>$val)
			{
                if ($val['login'] === $_POST['login'])
                    unset($acc_info[$key]);
			}
		}
        file_put_contents("../private/passwd", serialize($acc_info));
        file_put_contents("../private/ad_passwd", serialize($ad_acc_info));
        $_SESSION['loggued_on_user'] = "";
        echo "OK\n";
        header ('Location: succ_del.html');
        exit();
    }
?>