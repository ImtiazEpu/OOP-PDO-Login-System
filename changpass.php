<?php include "lib/User.php"; ?>
<?php include "inc/header.php"; ?>
<?php Session::ckeckSession(); ?>


<?php 

	if (isset($_GET['id'])) {
		$userid = (int)$_GET['id'];	
		$sessionid = Session::get("id");
		if ($userid != $sessionid){
			session_destroy();
    		session_unset();
    		echo "<script type='text/javascript'>window.top.location='login.php';</script>";
		}	
	}

	$user = new User();
	if ($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['updatepass'])) {
		$updatepass = $user->passUpdate($userid, $_POST);
		
	}



 ?>

		<div class="card" style="margin: 50px 0px">
			<div class="card-header">
				<h2>Change Password <span class="float-right"><a class="btn btn-outline-info" href="profile.php?id=<?php echo $userid; ?>">Back</a></span></h2>
			</div>

			<div class="card-body">
				<div style="max-width: 400px; margin: 0 auto; padding: 100px 0px; ">

				<?php 

				if (isset($updatepass)) {
					echo $updatepass;
				} 
			?>

				<form action="" method="POST">

					<div class="form-group">
						<label for="oldpass">Old Password</label>
						<input type="password" class="form-control" name="oldpass" id="oldpass"  placeholder="Enter your old password">
					</div>

					<div class="form-group">
						<label for="password">New Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Enter your new password">
					</div>

				<!-- 	<div class="form-group">
					<label for="conpass">Confirm Password</label>
					<input type="password" class="form-control" id="conpass"  name="conpass" placeholder="Confirm your password" >
				</div> -->
					
					<button type="submit" name="updatepass" class="btn btn-success">Update</button>
					
				</form>
				</div>
			</div>
			
		</div>

<?php include "inc/footer.php"; ?>	