<?php

function Table($rows, $cols){
   
    $table = '<table border="1">';

    for ($tr=1; $tr<=$rows; $tr++){
        $table .= '<tr>';
        for ($td=1; $td<=$cols; $td++){
            if ($tr===1 or $td===1){
                $table .= '<th>'. $tr*$td .'</th>';
            }else{
                $table .= '<td>'. $tr*$td .'</td>';
            }
        }
        $table .= '</tr>';
    }

    $table .= '</table>';
    print $table;
}

Table(10,10); 

?>