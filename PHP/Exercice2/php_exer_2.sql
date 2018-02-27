{\rtf1}
<?php
$password;
$salt;

$saltedPassword =  '';
$passwordFirstPartLentgh = floor(strlen($password)/2) + (strlen($password)%2);
$passwordSecondPartLentgh = ceil(strlen($password)/2);

$passwordFirstPart = substr($password,0, $passwordFirstPartLentgh);
$passwordSecondPart = substr($password,$passwordSecondPartLentgh);


$saltedPassword=$passwordFirstPart. $salt.$passwordSecondPart;