<?php
require_once('includes/predispatch.php');
require('includes/db.php');

require_once('includes/header.php');
?>


<!-- main content -->
<div id="content" class="row">
	
	<h2>Logging In&hellip;</h2>
	
	<?php
	try{
		if(!isset($_POST['username']) OR empty($_POST['username']) OR !is_string($_POST['username'])) throw new Exception('Missing or invalid username.');
		if(!isset($_POST['password']) OR empty($_POST['password']) OR !is_string($_POST['password'])) throw new Exception('Missing or invalid password.');
	
		$username = $_POST['username'];
		$password = $_POST['password'];
		$passwordMd5 = md5($password);
	
		$person = $db->query("SELECT * FROM person WHERE username='$username' AND passwordMd5='$passwordMd5'");

		if($person->num_rows == 1) {
			$user = $person->fetch_object();

			$_SESSION["loggedIn"] = TRUE;
			$_SESSION["username"] = $user->username;
			$_SESSION["person_id"] = $user->id;
		?>
			<div class="alert alert-success">
				<strong>Welcome, <?=$username?>!</strong>
				<p>You have successfully logged in. <a href="index.php">Home</a></p>
			</div>
		<?php
		} else {
		?>
			<div class="alert alert-danger">
				<strong>Error!</strong>
				<p>Your login was incorrect. Please try again.</p>
			</div>
		<?php
		}
	}
	catch(Exception $e){
		?>
		<div class="alert alert-danger">
			<strong>Error!</strong>
			<p>Your login was unsuccessful: "<?php echo $e->getMessage(); ?>". Please try again.</p>
		</div>
		<?php
	}
	?>
	
</div><!-- /main content -->


<?php require_once('includes/footer.php'); ?>