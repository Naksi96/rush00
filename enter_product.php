<html>
	<head>
		<meta charset="UTF-8">
		<title>Register your product</title>
		<link rel="stylesheet" href="index.css">
		<style>
			.subj {
				margin-top: 200px;
				text-align: center;
				font-family: arial;
				font-size: 35px;
				text-decoration: underline;
			}
			.login {
				margin-bottom: -1px;
				font-family: arial;
			}
			.row {
				display: inline;
				min-width: 300px;
			}
			.row:after {
				content: "";
				display: table;
				clear: both;
			}
			.column {
				width: 24%;
				min-width: 120px;
				float: left;
			}
			.left {
				margin-left: 30%;
			}
			.logbtn {
				position: absolute;
				left: 54%;
				margin-top: 1px;
				width: 131px;
			}
			.select {
				width: 131px;
				height: 19px;
			}
			.box {
				position: relative;
				left: 32%;
				width: 500px;
				height: 400px;
				border-radius: 10px;
				background-color: grey;
				box-shadow: 0px 14px 29px 2px rgba(0,0,0,0.75);
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
							<a href="#">My Cart</a>
							<?php
							require_once("auth.php");
							if (ad_auth($_SESSION['loggued_on_user']))
							{
								?>
								<a href="#">Add Products</a>
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
		<div class="box">
		<H1 class="subj">Please enter the product.</H1><br /><br><br><br>
		<form action="enter_product_create.php" method="POST" class="login">
			<div class="row">
<<<<<<< HEAD
				<div class="column left">Item Name:</div>
				<div class="column"><input type="text" name="name" value="" required placeholder="Item Name"/><br /></div>
				<div class="column left">Price:</div>
				<div class="column"><input type="number" name="price" value="" required placeholder="$"/><br /></div>
				<div class="column left">Category:</div>
=======
				<div class="column left">Item Name: <br></div>
				<div class="column"><input type="text" name="name" value="" required placeholder="Item Name"/><br /><br></div>
				<div class="column left">Price: <br></div>
				<div class="column"><input type="number" name="price" value="" required placeholder="$"/><br /><br></div>
				<div class="column left">Quantity: <br></div>
				<div class="column"><input type="number" name="quantity" value="" required placeholder="Quantity"/><br /><br></div>
				<div class="column left">Category: <br></div>
>>>>>>> 75ce9067022e75f8b2c6d5adb76b43feb2bc6ea8
				<div class="column">
					<select name="category" class="select">
						<option value="men">Men</option>
						<option value="women">Women</option>
						<option value="children">Children</option>
						<option value="sports">Sports</option>
					</select><br /><br>
				</div>
				<div class="column left">Type:</div>
				<div class="column">
					<select name="type" class="select">
						<option value="shoes">Shoes</option>
						<option value="clothing">Clothing</option>
						<option value="accessories">Accessories</option>
					</select><br /><br>
				</div>
				<div class="column left">Enter URL for img: <br></div>
				<div class="column"><input type="text" name="url" value="" required placeholder="URL"/><br /><br></div>
				<div class="column left"><br /></div>
				<div class="column"><input type="submit" name="submit" value="OK" class="logbtn"/></div>
			</div>
		</form>
	</div>
	</body>
</html>