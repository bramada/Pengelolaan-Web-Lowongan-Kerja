<?php 
require_once '../include/initialize.php';
// Four steps to closing a session
// (i.e. logging out)

// 1. Find the session
@session_start();

// 2. Unset all the session variables
// unset( $_SESSION['USERID'] );
// unset( $_SESSION['FULLNAME'] );
// unset( $_SESSION['USERNAME'] );
// unset( $_SESSION['PASS'] );
// unset( $_SESSION['ROLE'] );
 

unset($_SESSION['PER_USERID']);  
unset($_SESSION['PER_NAME']); 
unset($_SESSION['PER_USERNAME']);
// 4. Destroy the session
// session_destroy();
redirect(web_root."perusahaan/login.php?logout=1");
?>