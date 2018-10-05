 <?php
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath . '/../lib/Session.php';
	Session::init();
?> 

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Sourcecypher Login Portal</title>
	<link rel="stylesheet" href="inc/css/bootstrap.min.css">
	<script src="inc/js/jquery.min.js"></script>
	<script src="inc/js/bootstrap.min.js"></script>
</head>


<?php 

	if (isset($_GET['action']) && $_GET['action'] == "logout") {
		Session::destroy();
	}

 ?>

<body>
	<div class="container">
		<nav class="navbar navbar-light bg-light rounded border">
			<a class="navbar-brand" href="index.php">
				<img src="img/Sourcecypher.png" width="200" height="50" class="d-inline-block align-top" alt="">
			</a>
			<ul class="nav justify-content-end font-weight-bold">

				<?php 

					$id = Session::get("id");
					$userlogin = Session::get("login");
					if ($userlogin == true) {

				?>
				<li class="nav-item">	<a class="nav-link text-secondary" href="index.php">Home</a>
				</li>
				<li class="nav-item">	<a class="nav-link text-secondary" href="profile.php?id=<?php echo $id; ?>">Profile</a>
				</li>
				<li class="nav-item">	<a class="nav-link text-secondary" href="?action=logout">Logout</a>
				</li>
			
				<?php } else {?>

				<li class="nav-item">	<a class="nav-link text-secondary" href="login.php">Login</a>
				</li>
				<li class="nav-item">	<a class="nav-link text-secondary" href="register.php">Register</a>
				</li>

				<?php } ?>
			</ul>
		</nav>