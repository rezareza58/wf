<?php 

spl_autoload_register(
    function($namespace){
        $fileName = $namespace.'.php';
        $fileName = str_replace('\\','/',$fileName);
        $fileName = __DIR__.DIRECTORY_SEPARATOR.$fileName;
        if(is_file($fileName)){
            require_once $fileName;
        }
        
    }
);

use Model\Role;
use Model\User;
use Model\Person;

$user = new User();
$role = new Role(Role::ROLE_USER);

$user->setPassword('myPassword')
    ->setRoles([$role])
    ->setSalt('mySalt')
    ->setUsername('myUsername');

$person = new Person();
$person->setFirstname('Eric')
       ->setLastname('Montecalvo')
       ->setEmails(['eric.montecalvo@exaple.org']);