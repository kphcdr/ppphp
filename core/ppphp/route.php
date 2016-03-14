<?php
/* ========================================================================
 * 路由类
 * 主要功能,解析URL
 * ======================================================================== */
namespace ppphp;

class route
{
    public $ctrl;
    public $action;
    public $path;
    public $route;
    public function __construct()
    {
        $route = conf::all('route');
        if(isset($_SERVER['REQUEST_URI'])) {
            $pathstr = str_replace($_SERVER['SCRIPT_NAME'],'',$_SERVER['REQUEST_URI']);
            $path = explode('/',trim($pathstr,'/'));
            if(isset($path[0]) && $path[0]) {
                $this->ctrl = $path[0];
            } else {
                $this->ctrl = $route['DEFAULT_CTRL'];
            }
            
            if(isset($path[1]) && $path[1]) {
                $have = strstr($path[1],'?',true);
                if($have) {
                    $this->action = $have;
                } else {
                    $this->action = $path[1];
                }
                
            } else {
                $this->action = $route['DEFAULT_ACTION'];
            }
            unset($path[0],$path[1]);
            $this->path = array_merge($path);
            $pathlenth = count($path);
            $i = 0;
            while($i < $pathlenth) {
                if(isset($this->path[$i+1])) {
                    $_GET[$this->path[$i]] = $this->path[$i + 1];
                }
                $i = $i + 2;
            }
        } else {
            
            $this->ctrl = conf::conf('DEFAULT_CTRL','route');
            $this->action = conf::conf('DEFAULT_ACTION','route');
        }
    }

    public function urlVar($num)
    {
        return $this->path[$num];
    }
}