<?php

function easterReverse($filePath){
    $resource = fopen($filePath, 'r+');
    $fileContent = fread($resource, filesize($resource));
    
    fseek($resource, floor(strlen($fileContent)/2), SEEK_SET);
    
    $secondPart = "";
    
    do{
        $secondPart .= fgets($resource);
    }while(ftell($resource) < filesize($resource));
    
    strrev($secondPart);
    
    fseek($resource, floor(strlen($fileContent)/2), SEEK_SET);
    
    fwrite($resource,$secondPart, strlen($secondPart));
    fclose($resource);
}