<?php
$admin = 'admin';
$pass = 'd8578edf8458ce06fbc5bb76a58c5ca4';
$db = 'Users_BD';

if($_POST['submit']){
	if($admin == $_POST['login'] AND $pass == md5($_POST['password']) AND $db == $_POST['bd']){

            require_once 'connect.php';
            
       $query="SHOW TABLES FROM `Users_BD`";
   $table_list = mysqli_query($connect, $query) or die('Таблиця "Users"!');
    
   while ($row = mysqli_fetch_row($table_list)) {
        $tablename='Users';
        if ($tablename==$row[0]) {
             $table_ex=true;
        }
        else{ $table_ex=false;}
    }
       /* function tabl($connect, $tablename){
             $query="SHOW TABLES FROM `Users_BD`";
    $table_list = mysqli_query($connect, $query) or die('Таблиця "Users"!');
    //print_r( $table_list);
    
    while ($row = mysqli_fetch_row($table_list)) {
       // $tablename='Users';
        if ($tablename==$row[0]) {
           return  true;
        }
        else{ return false;}
    }
        }
         $table_ex=tabl(mysqli_connect('localhost', 'root', '*14518A9PE', 'Users_BD'), 'Users');*/

  if($table_ex== true) {
          echo '<p class="info">Таблиця "Users" вже існує!</p>';
    }
else {
$query ="CREATE TABLE Users
(
    uid INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    password VARCHAR(255)
)";
$result = mysqli_query($connect, $query) or die('Таблиця "Users" вже існує!');
if($result)
{
    echo '<p class="success">Таблиця "Users" успішно створена!</p>';
}
}


mysqli_close($connect);
}
else { echo '<p class="danger">Ви ввели невірні дані!</p>';}
}
?>
<html>
<head>
  <title>Створення таблиці БД: скрипт php</title>
  <link rel="stylesheet" href="entry.css">
</head>
<body>
  <div class="main">
  <h1>Введіть дані для створення<br> таблиці "Users" в базі даних:</h1>

  <form method="post">
    <div class="field">
<label for="bd"> Ім'я БД: </label>
<input type="text" name="bd" id="bd" required><br>
</div>
    <div class="field">
<label for="login"> Ваш логін: </label>
<input type="text" name="login" id="login" required><br>
</div>
<div class="field">
<label for="password"> Пароль: </label>
<input type="password" name="password" id="password" required>
</div>
<div style="margin-top: 20px; text-align: center;">
<input type="submit" name="submit" value="Створити!" />
</div>
</form>
</div>
</body>
</html>
