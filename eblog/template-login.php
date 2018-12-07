<?php
/* Template Name: Custom Login */

// get_header();

global $user_ID;

if (!$user_ID) {  
	//when user is not login

	if($_POST){  
		$username = $wpdb->escape($_POST['username']);
		$password = $wpdb->escape($_POST['password']);

		$login_data = array();  
$login_data['user_login'] = $username;  
$login_data['user_password'] = $password;  

		$user_verify = wp_signon( $login_data, true );
		if ( !is_wp_error($user_verify) )  {
			echo "<script>window.location = '".site_url()."' </script>";
			exit();
		}else{
			echo "invalid creadientals";
		}

	}else{

	?>
	
	<form method="post">
		
		<label>Username/Email</label>
		<input type="text" name="username" id="username" /> <br><br>
		
		<label>Password</label>
		<input type="password" name="password" id="password" /> <br><br>

		<input type="submit" value="Login" name="submit" id="submit" />

	</form>
	
	<?php
	}
}else{
	//user Login

}

?>



<!-- <?php get_footer(); ?> -->