<?php
session_start();

if($_GET['do'] == 'logout'){
	unset($_SESSION['admin']);
	session_destroy();
}

if(!$_SESSION['admin']){
header("Location: entry.php");
exit;
}

echo "<h1 style='padding-left: 30px; padding-top: 20px;''>Welcome!</h1>";
echo '<a href="welcome.php?do=logout" style="padding-left: 40px;">Exit</a>';
?>
