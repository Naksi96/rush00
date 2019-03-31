<?PHP
$item_info = unserialize(file_get_contents("../private/item"));
if ($item_info)
{
    foreach ($item_info as $key=>$val)
    {
        if ($val['name'] === $_POST['name'])
            unset($item_info[$key]);
    }
}
file_put_contents("../private/item", serialize($item_info));
echo "OK\n";
header ('Location: index.php');
exit();
?>