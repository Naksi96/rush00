<?PHP
    session_start();
    if ($_POST['name'] && $_POST['price'] && $_POST['url']
        && $_SESSION['loggued_on_user'] && $_POST['submit'] === "OK")
	{
		if (!file_exists("../private"))
			mkdir("../private");
		if (!file_exists("../private/item"))
			file_put_contents("../private/item", NULL);
		$item_info = unserialize(file_get_contents("../private/item"));
		$dup = FALSE;
		if ($item_info)
		{
			foreach ($item_info as $key=>$val)
			{
                if ($val['name'] === $_POST['name'] && $val['user'] === $_SESSION['loggued_on_user']
                    && $val['url'] === $_POST['url'] && $val['category'] === $_POST['category'] && $val['type'] === $_POST['type'])
                {
                    $item_info[$key]['price'] = $_POST['price'];
                    file_put_contents("../private/item", serialize($item_info));
                    echo "OK\n";
                    header('Location: index.php');
                    exit();
                }
                else if ($val['name'] === $_POST['name'] && ($val['user'] !== $_SESSION['loggued_on_user']
                    || $val['url'] !== $_POST['url']))
                {
                    echo "ERROR\n";
                    header('Location: enter_product.php');
                    exit();
                }
            }
		}
        $new_item['name'] = $_POST['name'];
        $new_item['price'] = $_POST['price'];
        $new_item['category'] = $_POST['category'];
        $new_item['type'] = $_POST['type'];
        $new_item['url'] = $_POST['url'];
        $new_item['user'] = $_SESSION['loggued_on_user'];
        $item_info[] = $new_item;
        file_put_contents("../private/item", serialize($item_info));
        echo "OK\n";
        header('Location: index.php');
        exit();
	}
	else
	{
		echo "ERROR\n";
		header('Location: enter_product.php');
		exit();
	}
?>