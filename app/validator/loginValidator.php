<?php
namespace app\validator;

use ppphp\validator\validator;

class loginValidator extends validator
{
    protected $id;
    protected $name;

    private $message = "验证不通过";
    public function valid()
    {
        $this->message = "验证失败";
        return true;

    }

    public function getMessage()
    {
        return $this->message;
    }

}

