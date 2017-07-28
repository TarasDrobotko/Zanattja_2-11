<?php

$page_title = 'Edit article';


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

 try {
 $stmt = $conn->prepare('SELECT id, title, short_desc, full_desc, timestamp FROM content WHERE id = :id');
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


if (isset($_POST['submit'])) {
  try {
    $stmt = $conn->prepare('UPDATE content SET title= :title, short_desc= :short_desc,
      full_desc= :full_desc, timestamp= :timestamp WHERE id = :id');
      $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
      // Обрізаємо усі теги у заголовку.
      $stmt->bindParam(':title', strip_tags($_POST['title']));

      // Екрануємо теги у полях короткого та повного опису.
      $stmt->bindParam(':short_desc', htmlspecialchars($_POST['short_desc']));
      $stmt->bindParam(':full_desc', htmlspecialchars($_POST['full_desc']));

      // Беремо дату та час, переводимо у UNIX час.
      $date = "{$_POST['date']}  {$_POST['time']}";
      $stmt->bindParam(':timestamp', strtotime($date));

    $status= $stmt->execute();

} catch(PDOException $e) {
  // Виводимо на екран помилку.
  print "ERROR: {$e->getMessage()}";
  // Закриваємо футер.
  require('base/footer.php');
  // Зупиняємо роботу скрипта.
  exit;
}
if($status) {
  print "Cтаттю було успішно оновлено!<br>";
  print '<a href="/edit.php?id=' . $_GET['id'] . '">Продовжити редагування</a>';
 exit;

}
 else{
    // Вивід повідомлення про невдале додавання матеріалу.
 print "Зміни, на жаль, не відображаються в статті!";
  }
}
?>
<!-- Пишемо форму, метод ПОСТ, форма відправляє дані на цей же скрипт. -->
<form action="<?php print $_SERVER["PHP_SELF"].'?id=' . $article['id'] ?> " method="POST">

  <div class="field-item">
    <label for="title">Заголовок</label>
    <input type="text" name="title" id="title" required maxlength="255" value="<?php echo $article['title']; ?>">
  </div>

  <div class="field-item">
    <label for="short_desc">Короткий зміст</label>
    <textarea name="short_desc" id="short_desc" required maxlength="600"><?php echo $article['short_desc']; ?></textarea>
  </div>

  <div class="field-item">
    <label for="full_desc">Повний зміст</label>
    <textarea name="full_desc" id="full_desc"
       required><?php echo $article['full_desc']; ?></textarea>
  </div>

  <div class="field-item">

    <label for="date">День створення</label>
    <input type="date" name="date" id="date" required
     value="<?php print date('Y-m-d', $article['timestamp']); ?>">

    <label for="time">Час створення</label>
    <input type="time" name="time" id="time" required
    value="<?php print date('G:i', $article['timestamp']); ?>">
  </div>

<!-- <div style="visibility: hidden;"><input type="text" name="id" id="id"
  value=""></div> -->
<input type="submit" name="submit" value="Зберегти">

</form>

<?php
// Підключаємо футер сайту.
require('base/footer.php');
?>
