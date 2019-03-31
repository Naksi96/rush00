<?PHP
    require_once('auth.php');
    session_start();
    if (!($_POST['login'] && $_POST['passwd'] && auth($_POST['login'], $_POST['passwd'])))
    {
        $_SESSION['loggued_on_user'] = "";
        echo "ERROR\n";
        header('Location: login.html');
    }
    else
    {
        $_SESSION['loggued_on_user'] = $_POST['login'];
        header('Location: index.php');
        exit();
    }
?>