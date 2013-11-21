<?php
require_once('includes/predispatch.php');
require_once('includes/header.php');
?>


<!-- main content -->
<div id="content" class="row">
	
	<h2>Logging Out&hellip;</h2>
	
	<?php 
		$_SESSION = array();
		session_destroy();
	?>

	<div class="alert alert-success">
		<p>You have successfully logged out. <a href="index.php">Home</a></p>
	</div>
	
</div><!-- /main content -->


<?php require_once('includes/footer.php'); ?>