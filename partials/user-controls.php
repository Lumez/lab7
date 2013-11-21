<?php

if(isset($_SESSION['loggedIn']) AND $_SESSION['loggedIn'] == TRUE) {
	require('partials/logout.php');
} else {
	require('partials/login.php');
}

?>