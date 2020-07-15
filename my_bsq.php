<?php 
$file = $argv[1];
$copy = $result = $max_position = [];
$max = 0; 
error_reporting(0);
foreach (file($file) as $row => $value)
{
    if ($row == 0) {
    $max_row = trim($value);
    }
    else {
        ($row == $max_row ? $plus = 2 : $plus = 0);
        for($i = 0; $i <  strlen($value) + $plus - 2; ++$i) {
        $max_line = strlen($value);
        if ($value[$i] == ".") {
        $copy[$row][$i] = 1; 
        $result[$row][$i] = $value[$i];
        }
        else {
             $copy[$row][$i] = 0; 
             $result[$row][$i] = $value[$i];
        }
        }
    }        
}

for ($i = 1; $i <= $max_row; $i++) {
  for ($j= 0; $j < $max_line; $j++) {
    if ($i != 0 && $j != 0  && $copy[$i][$j] > 0){
        $cache[$i][$j] = 1 + min($cache[$i][$j-1],$cache[$i-1][$j],$cache[$i-1][$j-1]);
     }
    if ($cache[$i][$j] > $max) {
        $max = $cache[$i][$j];
        $max_position = [$i,$j+1];
        } 
    }
}

$min_position = [$max_position[0] - $max,$max_position[1] - $max]; 
var_dump("position maximale: ",$max_position,"position minimale: ",$min_position,"carre max : ".$max);
for ($k = 0; $k <= $max_row; $k++) {
  for ($l= 0; $l <= $max_line; $l++) {
    if ($k > $min_position[0] && $k <= $max_position[0] && $l >= $min_position[1] && $l < $max_position[1])
    {
      echo "X";
    }
    else {
        echo $result[$k][$l];
}
    }
  echo "\n";
}

?> 
