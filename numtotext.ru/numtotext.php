<?php
function number_to_text($a)
{$a = number_to_text(1);

    if($a < 5){
		number_to_text(++$a);
        print $a;
	}
}
number_to_text(5);
?>