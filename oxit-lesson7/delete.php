<?php

$page_title = 'Delete article';


require('base/header.php');
if (!$editor) {
  header('HTTP/1.1 403 Unauthorized');
  print 'Доступ заборонено.';
  // Підключаємо футер та припиняємо роботу скрипта.
  require('base/footer.php');
  exit;
}
// Підключення БД, адже нам необхідне підключення для створення статті.

require('base/db.php');

// Якщо ми отримали дані з ПОСТа, тоді обробляємо їх та вставляємо.

 try {
    $stmt = $conn->prepare('SELECT title FROM content WHERE id = :id');
    // Додаємо плейсхолдер.
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();
    // Витягуємо статтю з запиту.
    $article = $stmt->fetch(PDO::FETCH_ASSOC);
 $stmt = $conn->prepare('DELETE FROM content WHERE id = :id');
$stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();
} catch(PDOException $e) {
  // Виводимо на екран помилку.
  print "ERROR: {$e->getMessage()}";
  // Закриваємо футер.
  require('base/footer.php');
  // Зупиняємо роботу скрипта.
  exit;
}
if($stmt && $article['title']) {
 print "Cтаттю  '{$article['title']}' було успішно видалено!";}
 if(!$stmt){
    // Вивід повідомлення про невдале додавання матеріалу.
 print "Запис, на жаль, не був видалений.";
  }
?>

<?php
// Підключаємо футер сайту.
require('base/footer.php');
?>
