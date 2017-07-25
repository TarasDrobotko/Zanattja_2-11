<?php
session_start();
if($_SESSION['admin']){
	header("Location: welcome.php");
	exit;
}

$admin = $_POST['login'];
$pass=md5($_POST['password']);


if($_POST['submit']){
            require_once 'connect.php';
            $query="SELECT name, password FROM Users WHERE name='" . $admin ."'";
            $result=mysqli_query($connect, $query) or die("Помилка " . mysqli_error($connect));
             
            if ($row = mysqli_num_rows($result)>0) {
             $user_ex=true;
        }
        else{ $user_ex=false;}
    
    if($user_ex==false){
            $query="INSERT INTO Users (uid, name, password) VALUES (NULL, '" . $admin . "' , '" . $pass. "')";
            echo $query;
            $result=mysqli_query($connect, $query);
            if($result) {echo '<p class="success">Cтворено новий обліковий запис у табличці "Users"!</p>';}
 }
  if($user_ex=true) {
  $query="SELECT name, password FROM Users WHERE password='" . $pass ."'";
  $result=mysqli_query($connect, $query) or die("Помилка " . mysqli_error($connect));
            if ($row = mysqli_num_rows($result)>0) {
             $pass_ex=true;
        }

     if($pass_ex==true && $user_ex==true) {$_SESSION['admin'] = $admin;
		header("Location: welcome.php");
     exit;}
  }
              mysqli_close($connect);  }


  ?>
<html>
<head>
  <title>Вхід на сайт</title>
  <link rel="stylesheet" href="entry.css">
</head>
<body>
  <div class="main">
  <h1>Вхід на сайт</h1>
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
