<?php
    session_start();
    $acc_info = unserialize(file_get_contents("../private/passwd"));
    foreach ($acc_info as $acc=>$usr)
    {
        if ($usr['login'] === $_SESSION['loggued_on_user']) {
            if ($_POST['email']) {
                $acc_info[$acc]['email'] = $_POST['email'];
            }
            if ($_POST['phone']) {
                $acc_info[$acc]['phone'] = $_POST['phone'];
            }
            if ($_POST['address']) {
                $acc_info[$acc]['address'] = $_POST['address'];
            }
        }
    }
    file_put_contents("../private/passwd", serialize($acc_info));
    echo "OK\n";
    header('Location: acc_info.php');
    exit();
?>