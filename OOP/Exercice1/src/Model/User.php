<?php 
namespace Model;

class user{
    private $id;
    protected $roles=[];
    protected $password;
    protected $salt;
    protected $username;
    
    public function getId(){
       return $this->id;
    }
    public function getRoles(){
        return $this->roles;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getSalt(){
        return $this->salt;
    }
    public function getUsername(){
        return $this->username;
    }
    public function setRoles($rol){
        $this->roles=$rol;
        return $this;
    }
    public function setPassword($pass){
        $this->password=$pass;
        return $this;
    }
    public function setSalt($sal){
        $this->salt=$sal;
        return $this;
    }
    public function setUsername($user){
        $this->username=$user;
        return $this;
    }
    public function eraseCredentials(){
        $this->password= null;
        $this->salt = null;
    }
}
