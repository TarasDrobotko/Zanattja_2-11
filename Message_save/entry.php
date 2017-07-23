<html>
<head>
  <title>Повідомлення</title>
  <link rel="stylesheet" href="entry.css">
</head>
<body>
  <div class="main">
  <h1>Ви можете написати повідомлення:</h1>
  <form method="post" action="action.php">
    <div class="column1">
<label for="login"> <b>Ваше ім'я:</b> </label>
</div>
<div class="column2">
<input type="text" name="login" required><br>
</div>
<div style="margin-top: 20px;" class="column1">
<label for="textarea"> <b>Текст повідомлення:</b> </label>
</div>
<div class="column2">
<textarea name="textarea" rows="7" cols="40" required></textarea>
</div>
<div style="margin-top: 20px; text-align: center;">
<input type="submit" name="submit" value="Надіслати" />
</div>
</form>
</div>
</body>
</html>
