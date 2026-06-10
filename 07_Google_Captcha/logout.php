<?php
session_start();

// Destroy all session data
session_unset();
session_destroy();

// Redirect to login page
header("Location:loginforcapcha2.php");
exit();
?>