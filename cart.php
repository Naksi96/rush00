<?php
	session_start();
	$curr_usr  = $_SESSION['loggued_on_user'];
	$cart_name = $_POST['name'];
	if (!file_exists("../private"))
		mkdir("../private");
	if (!file_exists("../private/$curr_usr"))
		file_put_contents("../private/$curr_usr", NULL);
	$cart_info = unserialize(file_get_contents("../private/$curr_usr"));
	$item_info = unserialize(file_get_contents("../private/item"));
	$dup = FALSE;
	if ($cart_info && $item_info)
	{
		foreach ($cart_info as $key=>$val)
		{
			if ($val['name'] === $cart_name)
			{
				$cart_info[$key]['quantity'] += $_POST['quantity'];
				file_put_contents("../private/$curr_usr", serialize($cart_info));
				echo "OK\n";
				header('Location: index.php');
				exit();
			}
		}
	}
	foreach ($item_info as $key=>$val)
	{
		if ($val['name'] === $cart_name)
		{
			$price = $val['price'];
			$quantity = $_POST['quantity'];
		}
	}
	$new_cart['name'] = $cart_name;
	$new_cart['price'] = $price;
	$new_cart['quantity'] = $quantity;
	$new_cart['user'] = $curr_usr;
	$cart_info[] = $new_cart;
	file_put_contents("../private/$curr_usr", serialize($cart_info));
	echo "OK\n";
	header('Location: index.php');
	exit();
?>