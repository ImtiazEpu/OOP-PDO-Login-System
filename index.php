<?php
include "inc/header.php";
?>
<?php
include "lib/User.php";
Session::ckeckSession();
?>


<?php


	$loginmsg = Session::get("loginmsg");
		if (isset($loginmsg)) {
		    echo $loginmsg;
		}

		Session::set("loginmsg", NULL);

?>
 


        <div class="card" style="margin: 20px 0px">
            <div class="card-header">
                <h4>User List <span class="float-right">Welcome! <strong>
                    <?php
						$name = Session::get("name");
						if (isset($name)) {
						    echo $name;
						}
					?>
					</strong>(<?php
						$username = Session::get("username");
						if (isset($username)) {
						    echo $username;
						}
					?>)</span></h4>
            </div>

            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th width="20%">Serial</th>
                        <th width="20%">Name</th>
                        <th width="20%">Username</th>
                        <th width="20%">Email</th>
                        <th width="20%">Action</th>
                    </tr>
<?php 

	$user = new User();
	$userdata = $user->getUserData();
	if ($userdata) {
		$i=0;
		foreach ($userdata as $sdata) {
			$i++
 ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $sdata['name']; ?></td>
                        <td><?php echo $sdata['username']; ?></td>
                        <td><?php echo $sdata['email']; ?></td>
                        <td>
                            <a class="btn btn-info" href="profile.php?id=<?php echo $sdata['id']; ?>">View</a>
                        </td>
                    </tr>

<?php } }else {?>
	<tr>
		<td colspan="5">
			<h2>No User Data Found !!</h2>
		</td>
	</tr>
<?php } ?>
                </table>
            </div>
            
        </div>

<?php
include "inc/footer.php";
?>