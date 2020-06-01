<?php
//login.php

include('database_connection.php');

if(isset($_SESSION['type']))
{
	header("location:index.php");
}

$message = '';

if(isset($_POST["login"]))
{
	$query = "
	SELECT * FROM user_details 
		WHERE user_email = :user_email
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
				'user_email'	=>	$_POST["user_email"]
			)
	);
	$count = $statement->rowCount();
	if($count > 0)
	{
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			if($row['user_status'] == 'Active')
			{
				if(password_verify($_POST["user_password"], $row["user_password"]))
				{
				
					$_SESSION['type'] = $row['user_type'];
					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['user_name'] = $row['user_name'];
					header("location:index.php");
				}
				else
				{
					$message = "<label>Wrong Password</label>";
				}
			}
			else
			{
				$message = "<label>Your account is disabled, Contact Master</label>";
			}
		}
	}
	else
	{
		$message = "<label>Wrong Email Address</labe>";
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Inventory Management System using PHP with Ajax Jquery</title>		
		<!--<script src="js/jquery-1.10.2.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/bootstrap.min.js"></script>-->

		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" href="css/style.css">
	    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">


	</head>
	<body>
		<br/>
	<div class="container">
		<h2 align="center">Inventory Management System</h2>
		<img src="./images/login.png" class="img">
		<br/>
		<div class="col-sm-6 col-sm-offset-3">
			<div class="panel panel-default" style="width: 54rem;">
				<div class="panel-heading" id="login"><b>Login</b></div>
				<div class="panel-body">
					<form method="post">
						<?php echo $message;?>
						<div class="form-group" id="input_email">
							<input id="txtbx" type="text" name="user_email" class="form-control" placeholder="User Email" required />
							<i class="fa fa-envelope fa" aria-hidden="true"></i>
						</div>
						<div class="form-group" id="input_password">
							<input id="txtbx" type="password" name="user_password" class="form-control" placeholder="Password" required />
							<i class="fa fa-lock fa-lg" aria-hidden="true"></i>
						</div>
						<div class="form-group">
							<input type="submit" id="login_button" name="login" value="Login" class="btn btn-info" />
						</div>
					</form>
				</div>		
			</div>
		</div>
	</div>
	</body>
</html>