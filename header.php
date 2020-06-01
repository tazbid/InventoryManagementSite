<?php
//header.php
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Inventory Management System</title>
		<!--<script src="js/jquery-1.10.2.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
		<script src="js/bootstrap.min.js"></script>-->


		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
	    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" />


	</head>
	<body>
		<br />
		<div class="container">
			<h2 align="center">Inventory Management System</h2>

			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<a href="index.php" class="navbar-brand">Home</a>
					</div>
					<ul class="nav navbar-nav">
					<?php
					if($_SESSION['type'] == 'master')
					{
					?>
						<li><a href="user.php">User</a></li>
						<li><a href="category.php">Category</a></li>
						<li><a href="brand.php">Brand</a></li>
						<li><a href="product.php">Product</a></li>
					<?php
					}
					?>
						<li><a href="order.php">Order</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count"></span> <?php echo $_SESSION["user_name"]; ?></a>
							<ul class="dropdown-menu">
								<li><a href="profile.php">Profile</a></li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</li>
					</ul>

				</div>
			</nav>
			