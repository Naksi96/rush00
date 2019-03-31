<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Ebabe</title>
		<link rel="stylesheet" href="index.css">
		<style>
			body {
				height: 10%;
				background-color: white;
			}
		</style>
	</head>
	<body >
		<div class="header_row">
			<div class="dropdown"><a href="index.php"><button class="homebtn"><h1>Home</h1></button></a></div>
			<div class="dropdown">
				<button class="dropbtn">MEN</button>
				<div class="dropdown-menu">
					<a href="#">SHOES</a>
					<a href="#">CLOTHIG</a>
					<a href="#">ACCESSORIES</a>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">WOMEN</button>
				<div class="dropdown-menu">
					<a href="#">SHOES</a>
					<a href="#">CLOTHIG</a>
					<a href="#">ACCESSORIES</a>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">KIDS</button>
				<div class="dropdown-menu">
					<a href="#">SHOES</a>
					<a href="#">CLOTHIG</a>
					<a href="#">ACCESSORIES</a>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">SPORTS</button>
				<div class="dropdown-menu">
					<a href="#">SHOES</a>
					<a href="#">CLOTHIG</a>
					<a href="#">ACCESSORIES</a>
				</div>
			</div>
			<?php
				session_start();
				if ($_SESSION['loggued_on_user']){
					?>
					<div class="logged">
						<button class="dropbtn"><?php echo $_SESSION['loggued_on_user']?></button>
						<div class="dropdown-log">
							<a href="acc_info.php">Account Info</a>
							<a href="mycart.php">My Cart</a>
							<?php
							require_once("auth.php");
							if (ad_auth($_SESSION['loggued_on_user']))
							{
								?>
								<a href="enter_product.php">Add Product</a>
								<?php
							}
							?>
							<a href="logout.php"><b>Logout</b></a>
						</div>
					</div>
					<?php
				} else
				{
					?>
					<div class="loginbtn"><a href="login.html"><button class="dropbtn"><b>Login</b></button></a></div>
					<?php
				}
			?>
		</div>
		<div>
			<?PHP
				$items = unserialize(file_get_contents("../private/item"));
				foreach($items as $key=>$val)
				{
					?>
					<div>
						<img src="<?php echo $val['url']?>"><br />
						<b><?php echo $val['name']?></b>
						<?php
							require_once("auth.php");
							if (ad_auth($_SESSION['loggued_on_user']) && $val['user'] === $_SESSION['loggued_on_user'])
							{
								?>
								<form action="product_del.php" method="POST">
									<div><input type="hidden" name="name" value="<?php echo $val['name']?>" />
									<div><input type="submit" name="submit" value="Delete product"/></div>
								</form>
								<?php
							}
						?>
						<b>$<?php echo $val['price']?></b>
						<?php if ($_SESSION['loggued_on_user']) { ?>
						<form action="cart.php" method="POST">
							<div><input type="hidden" name="name" value="<?php echo $val['name']?>" />
							<div>Quantity: <input type="number" name="quantity" value="" required placeholder="Enter Quantity"/><br /></div>
							<div><input type="submit" name="submit" value="Add to cart"/></div>
						</form>
						<?php } ?>
					</div>
					<?php
				}
			?>
		</div>
	</body>
</html>