<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '*');
define('DB_NAME', 'Users_BD');

$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    or die("Помилка " . mysqli_error($connect));
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
