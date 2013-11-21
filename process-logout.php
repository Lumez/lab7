<?php
require_once('includes/predispatch.php');
print_r($_SESSION);

$_SESSION = array();
session_destroy();

print_r($_SESSION);
?>