<?php
/* ========================================================================
 * 路由类
 * 主要功能,解析URL
 * ======================================================================== */
namespace ppphp;

class route
{
    /**
     * @var string $ctrl
     */
    public $ctrl;
    /**
     * @var string $action
     */
    public $action;
    public $path;
    public $route;

    public function __construct()
    {
        $routeMap = conf::all("routes");

        if (isset($_SERVER['REQUEST_URI'])) {
            $pathStr = trim($_SERVER['REQUEST_URI'], "/");

            //?后面的直接丢掉
            $path = explode('?', $pathStr);
            //去掉多余的分隔符
            $path = explode('/', trim($path[0], '/'));
            $ret     = $this->catchCtrl($path, $routeMap);

            dd($this->ctrl, $ret);
            //
            //            if (isset($path[0]) && $path[0]) {
            //                $this->ctrl = $path[0];
            //            }
            //            else {
            //                $this->ctrl = $route['DEFAULT_CTRL'];
            //            }
            //            unset($path[0]);
            //            //检测是否包含路由缩写
            //            if (isset($route['ROUTE'][$this->ctrl])) {
            //                $this->action = $route['ROUTE'][$this->ctrl][1];
            //                $this->ctrl   = $route['ROUTE'][$this->ctrl][0];
            //            }
            //            else {
            //                if (isset($path[1]) && $path[1]) {
            //                    $have = strstr($path[1], '?', true);
            //                    if ($have) {
            //                        $this->action = $have;
            //                    }
            //                    else {
            //                        $this->action = $path[1];
            //                    }
            //
            //                }
            //                else {
            //                    $this->action = $route['DEFAULT_ACTION'];
            //                }
            //                unset($path[1]);
            //            }

            $this->path = array_merge($path);
            $pathLenth  = count($path);
            $i          = 0;
            while ($i < $pathLenth) {
                if (isset($this->path[$i + 1])) {
                    $_GET[$this->path[$i]] = $this->path[$i + 1];
                }
                $i = $i + 2;
            }
        }
        else {

            $this->ctrl   = conf::get('DEFAULT_CTRL', 'route');
            $this->action = conf::get('DEFAULT_ACTION', 'route');
        }
    }

    public function urlVar($num, $default = false)
    {
        if (isset($this->path[$num])) {
            return $this->path[$num];
        }
        else {
            return $default;
        }
    }

    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * 用path数组和routes配置做匹配，优先匹配最下级
     * @param array $path
     * @param array $routeMap
     *
     * @return bool
     */
    protected function catchCtrl($path, $routeMap)
    {
        if (is_array($routeMap)) {
            $index = 0;
            $count = count($path);
            do {
                if (! isset($path[$index]) || empty($path[$index])) {
                    //为了匹配当前根路由
                    $path[$index] = "/";
                }
                if (array_key_exists($path[$index], $routeMap)) {
                    //匹配到了一层，剥掉尝试往下匹配
                    if (is_array($routeMap[$path[$index]])) {
                        $routeMap = $routeMap[$path[$index]];
                        array_shift($path);

                        $this->catchCtrl($path, $routeMap);
                        break;
                    }
                    else {

                        $this->ctrl = $routeMap[$path[$index]];
                        break;
                    }
                }
                $index++;
            } while ($index < $count);

        }


        return $this->ctrl ? true : false;
    }
}