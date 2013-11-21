<?php
require_once('includes/predispatch.php');
require('includes/db.php');

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

		print_r($_SESSION);
	}
	echo '<pre>$_POST contains: ';
		print_r($_POST);
	echo '</pre>';
}
catch(Exception $e){
	echo $e->getMessage();
}