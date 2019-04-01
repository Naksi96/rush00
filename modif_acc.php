<html>
	<head>
		<meta charset="UTF-8">
		<title>Ebabe</title>
		<link rel="stylesheet" href="index.css">
		<style>
			.tit {
				text-decoration: underline;
			}
		</style>
	</head>
	<body>
		<div class="header_row">
			<div class="dropdown"><a href="index.php"><button class="homebtn"><h1>Home</h1></button></a></div>
			<div class="dropdown">
				<button class="dropbtn">MEN</button>
				<div class="dropdown-menu">
					<a href="#">SHOES</a>
					<a href="#">CLOTHING</a>
					<a href="#">ACCESSORIES</a>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">WOMEN</button>
				<div class="dropdown-menu">
					<a href="#">SHOES</a>
					<a href="#">CLOTHING</a>
					<a href="#">ACCESSORIES</a>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">KIDS</button>
				<div class="dropdown-menu">
					<a href="#">SHOES</a>
					<a href="#">CLOTHING</a>
					<a href="#">ACCESSORIES</a>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">SPORTS</button>
				<div class="dropdown-menu">
					<a href="#">SHOES</a>
					<a href="#">CLOTHING</a>
					<a href="#">ACCESSORIES</a>
				</div>
			</div>
			<div class="logged">
				<button class="dropbtn"><?php session_start(); echo $_SESSION['loggued_on_user']?></button>
				<div class="dropdown-log">
					<a href="acc_info.php">Account Info</a>
					<a href="mycart.php">My Cart</a>
                    <?php
                        require_once("auth.php");
                        if (ad_auth($_SESSION['loggued_on_user']))
                        {
                            ?>
                            <a href="enter_product.php">Add Products</a>
                            <?php
                        }
                    ?>
					<a href="logout.php"><b>Logout</b></a>
				</div>
			</div>
        </div>
        <div class="acc_info">
            <h2 class="tit">Account Information</h2><br />
			<div>User ID: <b><?php echo $_SESSION['loggued_on_user']?></b><br /><br></div>
			<?php
				$acc_info = unserialize(file_get_contents("../private/passwd"));
				foreach ($acc_info as $acc=>$usr)
				{
					if (($usr['login'] === $_SESSION['loggued_on_user']))
					{
						?>
							<form action="modif_info.php" method="POST" class="login">
								<div>E-mail: <input type="text" name="email" value="<?php echo $usr['email']?>" /><br /></div>
								<div>Phone: <input type="text" name="phone" value="<?php echo $usr['phone']?>" /><br /></div>
								<div>Address: <input type="text" name="address" value="<?php echo $usr['address']?>" /><br /></div>
								<div class="column"><input type="submit" name="submit" value="OK"/></div>
							</form>
						<?php
					}
				}
			?>
        </div>
	</body>
</html>