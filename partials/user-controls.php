<?php

if(isset($_SESSION['loggedIn'])) {
	require('partials/logout.php');
} else {
	require('partials/login.php');
}

?>