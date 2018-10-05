<?php include "lib/User.php"; ?>
<?php include "inc/header.php"; ?>
<?php Session::ckeckSession(); ?>


<?php 

	if (isset($_GET['id'])) {
		$userid = (int)$_GET['id'];		
	}

	$user = new User();
	if ($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['update'])) {
		$updateuserinfo = $user->userUpdate($userid, $_POST);
		
	}



 ?>

		<div class="card" style="margin: 50px 0px">
			<div class="card-header">
				<h2>User Profile <span class="float-right"><a class="btn btn-outline-info" href="index.php">Back</a></span></h2>
			</div>

			<div class="card-body">
				<div style="max-width: 400px; margin: 0 auto; padding: 100px 0px; ">

				<?php 
					
					$userdata = $user->getUserById($userid);
					if ($userdata) {
				?>

				<?php 

				if (isset($updateuserinfo)) {
					echo $updateuserinfo;
				} 
			?>

				<form action="" method="POST">

					<div class="form-group">
						<label for="name">Your Name</label>
						<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your name" value="<?php echo $userdata->name;  ?>">
					</div>

					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username"  placeholder="Enter your Username" value="<?php echo $userdata->username;  ?>">
					</div>

					<div class="form-group">
						<label for="email">Email Address</label>
						<input type="email" class="form-control" id="email"  name="email" placeholder="Enter your email" value="<?php echo $userdata->email;  ?>">
					</div>
					<?php 

						$sessionid = Session::get("id");
						if ($userid == $sessionid){
					?>
					<button type="submit" name="update" class="btn btn-success">Update</button>
					<a class="btn btn-danger" href="changpass.php?id=<?php echo $userid; ?>">Password Change</a>
					<?php } ?>	
				</form>
			<?php } ?>
				</div>
			</div>
			
		</div>

<?php include "inc/footer.php"; ?>	