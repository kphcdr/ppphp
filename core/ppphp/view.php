<?php

namespace ppphp;

trait view
{

    /**
     * 为模板对象赋值
     */
    public function assign($name, $data)
    {
        $this->assign[$name] = $data;
    }

    /**
     * 用于在控制器中加载一个模板文件
     */
    public function display($file)
    {
        if (is_file(APP . 'views/' . $file)) {
            \Twig_Autoloader::register();
            $loader = new \Twig_Loader_Filesystem(APP . 'views/');
            $twig = new \Twig_Environment($loader, [
                'cache' => PPPHP . '/log/twig_cache',
                'debug' => DEBUG,
            ]);

            $template = $twig->loadTemplate($file);
            $template->display($this->assign ? $this->assign : []);
        } else {
            if (DEBUG) {
                throw new \Exception($file . '是一个不存在的模板文件');
            } else {
                show404();
            }
        }
    }
}