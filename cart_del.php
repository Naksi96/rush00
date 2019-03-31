<?php
    session_start();
    $curr_usr = $_SESSION['loggued_on_user'];
    $cart_name = $_POST['name'];
    $cart_info = unserialize(file_get_contents("../private/$curr_usr"));
    foreach ($cart_info as $k=>$v)
    {
        if ($v['name'] === $cart_name)
        {
            unset($cart_info[$k]);
        }
    }
    file_put_contents("../private/$curr_usr", serialize($cart_info));
    echo "OK\n";
    header('Location: mycart.php');
    exit();
?>