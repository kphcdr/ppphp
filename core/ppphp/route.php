<?php
namespace ppphp;

class route
{
    public $ctrl;
    public $action;
    public function __construct()
    {
        if(isset($_SERVER['PATH_INFO'])) {
            $path = explode('/',trim($_SERVER['PATH_INFO'],'/'));
            if(isset($path[0])) {
                $this->ctrl = $path[0];
            } else {
                $this->ctrl = conf::conf('DEFAULT_CTRL','route');
            }
            
            if(isset($path[1])) {
                $this->action = $path[1];
            } else {
                $this->action = conf::conf('DEFAULT_ACTION','route');
            }            
        } else {
            
            $this->ctrl = conf::conf('DEFAULT_CTRL','route');
            $this->action = conf::conf('DEFAULT_ACTION','route');
        }
    }
}