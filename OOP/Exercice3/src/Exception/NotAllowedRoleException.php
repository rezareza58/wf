<?php
namespace Exception;
class NotAllowedRoleException extends \RuntimeException{
    protected $allowedRoles;
    protected $label;
    public function __construct(
        array $allowedRoles,
        string $label,
        $message = null,
        $code = null,
        $previous = null
        ){
            $this->allowedRoles=$allowedRoles;
            $this->label = $label;
            
            $message = $this->getNewMessage().$message;
            parent::__construct($message,$code,$previous);
    }
    private  function getNewMessage()
    {
        $allowedReference = '['. implode(',',$this->allowedRoles).']';
        $mismatchimgReference = $this->label;
        
        $message ='Usage of'.$mismatchimgReference.'is not allowed.';
        $message .= 'Only '.$allowedReference.' are allowed.';
        return $message;
    }
}