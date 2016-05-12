<?php
namespace ppphp\lib\cache;

use ppphp\conf;

class file
{
    private $path;  #存储路径
    private $time = 3600;  #存活时间
    public function __construct($option)
    {
        foreach($option as $key=>$a) {
            $this->$key = $a;
        }
    }

    public function get($name)
    {
        if(is_file($this->path.'/'.$name.'.ppcache')) {
            $ret = json_decode(file_get_contents($this->path . '/' . $name . '.ppcache'), true);
            if($ret['time'] == 0 || $ret['time'] >= TIME) {
                return $ret['data'];
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    public function set($name,$value,$time = false)
    {
        if (!is_dir($this->path))
        {
            mkdir($this->path,0755,true);
        }
        if($time === false) {
            $time  = TIME + $this->time;
        } else if($time === 0){
            $time = 0;
        } else {
            $time += TIME;
        }
        $file = $this->path.'/'.$name.'.ppcache';
        $data['data'] = $value;
        $data['time'] = $time;
        return file_put_contents($file, json_encode($data));
    }

    public function del($name)
    {
        $file = $this->path.'/'.$name.'.ppcache';
        if (is_file($file)) {
            return unlink($file);
        } else {
            return false;
        }
    }

    public function clear()
    {
        $dh=opendir($this->path);
        while ($file=readdir($dh)) {
            if($file!="." && $file!="..") {
                $fullpath=$this->path."/".$file;
                if(!is_dir($fullpath)) {
                    unlink($fullpath);
                } else {
                    deldir($fullpath);
                }
            }
        }
    }
}