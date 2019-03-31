<?PHP
    function auth($login, $passwd)
    {
        $acc_info = unserialize(file_get_contents("../private/passwd"));
        foreach($acc_info as $acc=>$usr)
        {
            if (($usr['login'] === $login) && ($usr['passwd'] === hash("whirlpool", $passwd)))
                return TRUE;
        }
        return FALSE;
    }
    function ad_auth($login)
    {
        $ad_acc_info = unserialize(file_get_contents("../private/ad_passwd"));
        if ($ad_acc_info)
        {
            foreach($ad_acc_info as $acc=>$usr)
            {
                if ($usr['login'] === $login)
                    return TRUE;
            }
        }
        return FALSE;
    }
?>