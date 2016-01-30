<?php
namespace ppphp;

class route
{
    public $ctrl;
    public $action;
    public function __construct()
    {
        if(isset($_SERVER['REQUEST_URI'])) {
            $pathstr = str_replace($_SERVER['SCRIPT_NAME'],'',$_SERVER['REQUEST_URI']);
            $path = explode('/',trim($pathstr,'/'));
            if(isset($path[0]) && $path[0]) {
                $this->ctrl = $path[0];
            } else {
                $this->ctrl = conf::conf('DEFAULT_CTRL','route');
            }
            
            if(isset($path[1]) && $path[1]) {
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