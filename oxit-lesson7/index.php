<?php

// Підключаємо хедер сайту.
require('base/header.php');
// Підключаємо файл БД, адже нам необхідно вибрати статті.
require('base/db.php');


try {
  // Вибираємо усі з необхідними полями статті та поміщаємо їх у змінну $articles.
  $stmt = $conn->prepare('SELECT id, title, short_desc, timestamp FROM content ORDER BY timestamp DESC LIMIT 0,10');
  $stmt->execute();
  $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
  // Виводимо на екран помилку.
  print "ERROR: {$e->getMessage()}";
  // Закриваємо футер.
  require('base/footer.php');
  // Зупиняємо роботу скрипта.
  exit;
}

?>
<!-- Вітальне повідомленя на головній сторінці. -->
<h1> Welcome to blog site!</h1>
<!-- Виводимо статті у тегах -->
<div class="articles-list">

  <?php if (empty($articles)): ?>
    <!-- У випадку, якщо статтей немає - виводимо повідомлення. -->
    Статті відсутні.
  <?php endif; ?>
  <?php foreach ($articles as $article): ?>
    <div class="article-item">

      <h2><a href="/oxit-lesson7/article.php?id=<?php print $article['id']; ?>"><?php print $article['title']; ?></a></h2>

      <div class="description">
        <?php print $article['short_desc']; ?>
      </div>

      <div class="info">
        <div class="timestamp">
          <!-- Вивід відформатованої дати створення. -->
          <?php print date('d/m/Y G:i', $article['timestamp']); ?>
        </div>
        <div class="links">
          <a href="/oxit-lesson7/article.php?id=<?php print $article['id']; ?>">Читати далі</a>
          <!-- Посилання доступні тільки для редактора. -->
          <? if($editor): ?>
            <a href="/oxit-lesson7/edit.php?id=<?php print $article['id']; ?>">Редагувати</a>
            <a href="/oxit-lesson7/delete.php?id=<?php print $article['id']; ?>">Видалити</a>
          <? endif; ?>
        </div>
      </div>

    </div>
    <hr>
  <?php endforeach; ?>

  <div class="pager">
    <!-- Пейджер на розробці. -->
    Pager this!
  </div>

</div>

<?php
// Підключаємо футер сайту.
require('base/footer.php');
?>
