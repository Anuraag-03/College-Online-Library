<?php
// Defining string literals (constant throughout)
define("DBHOST","localhost");
define("DBUSERNAME","root");
define("DBPASSWORD","");
define("DB","lib");
// establishing connetction with Lib Database
$conn = mysqli_connect(DBHOST,DBUSERNAME,DBPASSWORD,DB);
?>
