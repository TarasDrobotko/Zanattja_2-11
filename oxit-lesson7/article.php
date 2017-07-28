<?php

// Підключаємо файл до БД, адже потрібно вибрнати дані.
require('base/db.php');

// Робимо запит до БД, вибираємо статтю по параметру ГЕТ.
try {
  $stmt = $conn->prepare('SELECT id, title, full_desc, timestamp FROM content WHERE id = :id');
  // Додаємо плейсхолдер.
  $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
  $stmt->execute();
  // Витягуємо статтю з запиту.
  $article = $stmt->fetch(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
  // Виводимо на екран помилку.
  print "ERROR: {$e->getMessage()}";
  // Закриваємо футер.
  require('base/footer.php');
  // Зупиняємо роботу скрипта.
  exit;
}

// Задаємо заголовок сторінки.
$page_title = "{$article['title']} | Blog site";

// Підключаємо шапку сайту.
require('base/header.php');
?>

<!-- Виводимо статтю у тегах -->
<div class="article-once">
  <h1><?php print $article['title']; ?></h1>
  <div class="info-wrapp">
    <span class="timestamp"><?php print date('d/m/Y G:i', $article['timestamp']); ?></span>
    <? if($editor): ?>
      <a href="/oxit-lesson7/edit.php?id=<?php print $article['id']; ?>">Редагувати</a>
      <a href="/oxit-lesson7/delete.php?id=<?php print $article['id']; ?>">Видалити</a>
    <? endif; ?>
  </div>
  <div class="full-desc">
    <?php print $article['full_desc']; ?>
  </div>
</div>


<?php
// Підключаємо футер сайту.
require('base/footer.php');
?>
