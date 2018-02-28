<?php
function getAllMondaysOfMonth($year,$month) { 
    $mondays = [];
    
    $currentMonth = DateTime::createFromFormat('Ym', $year . $month);
    $firstMonday = new DateTime('first monday of'.$currentMonth->format('F Y'));
    
    $interval = DateInterval::createFromDateString('next monday');
    
    $lastMonday = new DateTime('last monday of'.$currentMonth->format('F Y'));
    while($firstMonday<=$lastMonday){
        $mondays[]= $firstMonday->format('l j, M Y');
        $firstMonday->add($interval);
    }
    return $mondays;
}



