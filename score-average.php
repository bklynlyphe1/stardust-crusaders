<?php

$scores = [50,60,70,80,90,60,80,90,0,50,80,100,80,80,80,30,0];
$sum = 0;
$count = 0;

foreach($scores AS $score){
    if($score=== 0){
        continue;
    }
    $sum += $score;
    $count++;
}
$average = $sum/$count;
echo "Average: ".$average;

