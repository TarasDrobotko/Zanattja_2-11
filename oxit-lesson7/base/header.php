<?php
// Початок буферу.
ob_start();
// Початок або продовження сесії.
session_start();
// Створюємо змінну $editor, у якій міститься інформація про роль користувача на сайті.
$editor = (bool) $_SESSION['login'];

// Якщо раніше заголовок сторінки не був заданий, тоді ми його задаємо.
if (!isset($page_title)) {
  $page_title = 'Blog site';
}

?>
<!-- Виводимо основну структуру сайту. -->
<!DOCTYPE html>
<html>
<head>
  <title><?php print $page_title; ?></title>
  <!-- CSS files -->
</head>
<body>
<!-- Будуємо меню сайту. -->
<div class="header" style="width:50%;margin:0 auto;border:1px solid black;background-color:gray;">
  <ul class="main-menu">
    <li><a href="/oxit-lesson7/index.php">Головна сторінка<a></li>
    <?php if ($editor): ?>
      <li><a href="/oxit-lesson7/add.php">Додати статтю<a></li>
      <li><a href="/oxit-lesson7/logout.php">Вихід<a></li>
    <?php endif; ?>
    <?php if (!$editor): ?>
      <li><a href="/oxit-lesson7/login.php">Вхід<a></li>
    <?php endif; ?>
  </ul>
</div>
