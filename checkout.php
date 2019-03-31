<?php
	session_start();
	$curr_usr = $_SESSION['loggued_on_user'];
	if (!file_exists("../private"))
		mkdir("../private");
	if (!file_exists("../private/history"))
		file_put_contents("../private/history", NULL);
	$purchase_info = unserialize(file_get_contents("../private/history"));
	$new_purchase = unserialize(file_get_contents("../private/$curr_usr"));
	$purchase_info[] = $new_purchase;
	file_put_contents("../private/history", serialize($purchase_info));
	file_put_contents("../private/$curr_usr", NULL);
	echo "OK\n";
	header('Location: mycart.php');
	exit();
?>