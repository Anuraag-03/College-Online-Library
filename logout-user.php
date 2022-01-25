<?php
// session start 
session_start();
// clears all session variables
session_unset();
// destroys session
session_destroy();
// redirects to login page
header('location: login-user.php');
?>