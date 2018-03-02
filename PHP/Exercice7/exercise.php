<?php

function divide(int $num1, int $num2){
    if($num2 == 0){
        throw new RuntimeException('Division by 0 is not allowed');
    } 
        echo ($num1/$num2);
        return $num1/$num2;
}

function arrayDivide(array $something , $someone){
    $result = [];
    foreach ($something as $value){
        try{
            $result[]=divide($value, $someone);
            
        }catch(RuntimeException $e){
            $result[]=$value;
            //array_push($result,$value)
            return $something;
            
        }
    }
        
    return $result;

}