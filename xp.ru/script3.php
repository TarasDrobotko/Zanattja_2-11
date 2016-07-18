
<?php 


$table = '<table border="1">'; 
 
for($r = 0; $r<$_GET['number2']; $r++){
$table .= '<tr>'; 
for($d = 0; $d<$_GET['number1']; $d++){ ;
$table .= '<td width="50" height="50"></td>';

} 
$table .= '</tr>'; 
} 
$table .= '</table>'; 

print rand();
print $table; 


?>
