<?php session_start();
$_SESSION['number2']=strip_tags($_GET['number2']);
$_SESSION['number1']=strip_tags($_GET['number1']);
?>
<html>
<head>
 <meta charset="utf-8">
   <link href="css/bootstrap.min.css" rel="stylesheet">
 <title>Tablycja</title>
 </head>
 <body>
<form action="script4.php" method="GET" class="container">
<?php 

echo '<div style="height:40px"></div>';
echo '<div style="margin-left: 50px;">';
echo '<p><b>Заповніть комірки таблиці Вашим текстом:</b></p>';
$table .= '<table class="table table-bordered" style="width:30%">'; 

 $i=0;
for($r = 0; $r<$_SESSION['number2']; $r++){
$table .= '<tr>'; 
for($d = 0; $d<$_SESSION['number1']; $d++){

$table .= '<td width="50" height="50"> '. '<input type="text" name="' . ($i++) .'" size="7">' . '</td>';
}


$table .= '</tr>'; 
} 
$table .= '</table>'; 


print $table; 
echo '<input type="submit"  style="margin-left: 10px;" value="Готово!" class="btn btn-primary"></div>';
?>
</form>
</body>
</html>
