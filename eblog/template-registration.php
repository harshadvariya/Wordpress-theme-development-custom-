<?php
/* Template Name: Custom Registration */

get_header();

global $wpdb;

if($_POST){
	//collect form info
	$username = $wpdb->escape($_POST['username']);
	$email = $wpdb->escape($_POST['email']);
	$password = $wpdb->escape($_POST['password']);
	$confirmpwd = $wpdb->escape($_POST['confirmpwd']);
	$error = array();

	//check Blank or not
	if(strpos($username, ' ') !== false){
		$error['username_space'] = "username has Space"; 
	}

	if(empty($username)){
		$error['username_empty'] = "Please fill username"; 
	}

	if(username_exists( $username )){
		$error['username_exists'] = "username already exists"; 
	}

	if(!is_email($email)){
		$error['email_valid'] = "email has no valid value"; 
	}

	if(email_exists($email)){
		$error['email_exists'] = "email already exists"; 
	}

	if(strcmp($password , $confirmpwd)!== 0){
		$error['password'] = "password does not match!";
	}

	if(count($error) == 0){
		wp_create_user( $username, $password, $email );
		// $user = new WP_User( $user_id );
		// $user->set_role( 'Administrator' );
		echo "user created sucessfully!";
		exit();
	}else{
		print_r($error);
	}


}

?>

<form method="post">
	<label>Username</label>
	<input type="text" name="username" id="username" /> <br><br>
	
	<label>Email</label>
	<input type="text" name="email" id="email" /> <br><br>

	<label>Password</label>
	<input type="password" name="password" id="password" /> <br><br>

	<label>Confirm Password</label>
	<input type="password" name="confirmpwd" id="confirmpwd" /> <br><br>

	<input type="submit" name="submit" id="submit" />

</form>

<?php
	get_footer();
?>