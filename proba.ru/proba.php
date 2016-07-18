<?php
function numbers_func($number){ 
    print $number;
    if($number < 5){
		numbers_func(++$number);
   }
}
numbers_func(1);     
?>



