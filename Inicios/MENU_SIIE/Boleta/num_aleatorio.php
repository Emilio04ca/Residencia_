<?php
function shuffle_nums($min,$max, $count)
{
    $nums = range($min, $max);
    shuffle($nums);
    
    $response = array();
    for($i=0;$i<$count && $i<count($nums);$i++)
    {
        array_push($response, $nums[$i]);
    }
    $string = implode("",$response);
    $valorentero = (int)$string;
    return $valorentero;
}
?>