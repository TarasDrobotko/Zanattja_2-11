<?php
session_start();
if($_SESSION['admin']){
	header("Location: welcome.php");
	exit;
}

$admin = 'admin';
$pass = 'd8578edf8458ce06fbc5bb76a58c5ca4';

if($_POST['submit']){
	if($admin == $_POST['login'] AND $pass == md5($_POST['password'])){
		$_SESSION['admin'] = $admin;
		header("Location: welcome.php");
		exit;}
//  else  echo '<p style="color: red;"> Wrong username or password.</p>'; 
  } ?>
<html>
<head>
  <title>Вхід на сайт</title>
  <link rel="stylesheet" href="entry.css">
</head>
<body>
  <div class="main">
  <h1>Вхід на сайт</h1>
  <?php if($_POST['submit']){
  	if(!($admin == $_POST['login'] AND $pass == md5($_POST['password']))){
  		  echo '<p style="color: red;"> Wrong username or password.</p>';
    }
  } ?>
  <form method="post">
    <div class="field">
<label for="login"> login: </label> <input type="text" name="login" id="login"><br>
</div>
<div style="margin-top: 20px;" class="field">
<label for="password"> password: </label> <input type="password" name="password" id="password">
</div>
<div style="margin-top: 20px; text-align: center;">
<input type="submit" name="submit" value="Ввійти" />
</div>
</form>
</div>
</body>
</html>
