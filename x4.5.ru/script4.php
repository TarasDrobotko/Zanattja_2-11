<?php session_start();
?>
<html>
<head>
 <meta charset="utf-8">
   <link href="css/bootstrap.min.css" rel="stylesheet">
 <title>Tablycja</title>
 </head>
 <body>
<?php 
echo '<div style="height:40px"></div>';
echo '<div style="margin-left: 50px;">';
$table .= '<table class="table table-bordered" style="width:30%">'; 
 $i=0;
for($r = 0; $r<$_SESSION['number2']; $r++){
$table .= '<tr>'; 
for($d = 0; $d<$_SESSION['number1']; $d++){ 
$table .= '<td width="50" height="50"> '. strip_tags($_GET[$i++]) . '</td>';

} 

$table .= '</tr>'; 
} 
$table .= '</table>'; 


print $table; 
echo '</div>';
?>
</body>
</html>
