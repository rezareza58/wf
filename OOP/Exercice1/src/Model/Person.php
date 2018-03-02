<?php 
namespace Model;

class person{
  private $id ;
  protected $firstname;
  protected $lastname;
  protected $emails= [];
 
  public function getId(){
      return $this->id;
  }
  public function getFirstname(){
      return $this->firstname;
  }
  public function getLastname(){
      return $this->lastname;
  }
  public function getEmails(){
      return $this->emails;
  }
  public function setFirstname($first){
      $this->firstname=$first;
      return $this;
  }
  public function setLastname($last){
      $this->lastname=$last;
      return  $this;
  }
  public function setEmails(array $email){
      $this->emails=$email;
      return $this;
  }
}
