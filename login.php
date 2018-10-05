<?php include "inc/header.php"; ?>
<?php include "lib/User.php"; ?>
<?php Session::ckeckLogin(); ?>

<?php 
	$user = new User();
	if ($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['login'])) {
		$userlog = $user->userLogin($_POST);
		
	}

 ?>

		<div class="card" style="margin: 50px 0px">
			<div class="card-header">
				<h2>User Login</h2>
			</div>

			<div class="card-body">
				<div style="max-width: 400px; margin: 0 auto; padding: 100px 0px; ">

				<?php 

				if (isset($userlog)) {
					echo $userlog;
				} 
			?>


				<form action="" method="POST">
					<div class="form-group">
						<label for="email">Email address</label>
						<input type="email" class="form-control" id="email" name="email"  placeholder="Enter email">
						<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					</div>
					<button type="submit" name="login" class="btn btn-success role="alert">Login</button>
				</form>
				</div>
			</div>
			
		</div>

<?php include "inc/footer.php"; ?>	