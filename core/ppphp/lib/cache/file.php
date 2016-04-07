<?php
namespace ppphp\lib\cache;

use ppphp\conf;

class file
{
    private $path;
    public function __construct()
    {
        $this->path = conf::get('CACHE_PATH','cache');

    }

    public function get($name)
    {

    }

    public function set($name,$value,$time = false)
    {
        $file = $this->path.'/'.$name.'.php';
        $data['data'] = $value;
        $data['time'] = TIME;
        return file_put_contents($file, "<?php\treturn " . var_export($data, true) . ";?>");
    }
}