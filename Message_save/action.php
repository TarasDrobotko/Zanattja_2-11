<?php
//создаем объект DateTime с текущей датой
if ($_POST) {
	
$date = date_create();
//определяем имя файла
$file_name = "messages/" . date_format($date, 'YmdHis.u') . ".txt";
$file=fopen($file_name,'w+');
$text=fwrite($file, $_POST['login'] . "\r\n");
$text=fwrite($file, $_POST['textarea']);
if($text) echo 'Дані записані у файл!';
else echo 'Помилка при записуванні у файл.';
fclose($file);
}
?>
