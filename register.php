<?php
include "inc/header.php";
?>
<?php
include "lib/User.php";
?>

<?php
	$user = new User();
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $userRegi = $user->UserRegistration($_POST);
    
}

?>

        <div class="card" style="margin: 50px 0px">
            <div class="card-header">
                <h2>User Registration</h2>
            </div>

            <div class="card-body">
                <div style="max-width: 400px; margin: 0 auto; padding: 100px 0px; ">

      		<?php

				if (isset($userRegi)) {
				    echo $userRegi;
				}
			?>

                <form action="" method="POST">

                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your name">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username"  placeholder="Enter your Username">
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email"  name="email" placeholder="Enter your email" >
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
                    </div>

                    <button type="submit" name="register" class="btn btn-success">Submit</button>
                </form>
                </div>
            </div>
            
        </div>

<?php
include "inc/footer.php";
?>    