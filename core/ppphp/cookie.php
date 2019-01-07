<?php
namespace ppphp;

class cookie
{
    const SECRETKEY = 'jonson';//混淆字符串

    /**
     * 获取cookie
     * name cookie名称
     */
    public static function get($name)
    {
        if ($name != '') {
            return empty($_COOKIE[$name]) ? '' : self::decrypt($_COOKIE[$name]);
        }
        else {
            return '';
        }
    }

    /**
     * 字符串解密
     */
    private static function decrypt($string)
    {
        $code   = '';
        $key    = substr(md5(self::SECRETKEY), 8, 18);
        $strLen = strlen($string);
        $keyLen = strlen($key);
        for ($i = 0; $i < $strLen; $i++) {
            $k = $i % $keyLen;
            $code .= $string[$i] ^ $key[$k];
        }

        return base64_decode($code);
    }

    /**
     * 删除cookie
     */
    public static function drop($name)
    {
        if ($name == '' || empty($_COOKIE[$name])) {
            return true;
        }
        else {
            return self::set($name, '', '-10');
        }
    }

    /**
     * 设置cookie
     * name    必需。规定 cookie 的名称。
     * value    必需。规定 cookie 的值。
     * expire    可选。规定 cookie 的有效期。
     * path    可选。规定 cookie 的服务器路径。
     * domain    可选。规定 cookie 的域名。
     * secure    可选。规定是否通过安全的 HTTPS 连接来传输 cookie。
     */
    public static function set($name, $value = null, $expire = 3600, $path = '/', $domain = '', $secure = 0)
    {
        if ($name != '' && $value != '') {
            $value  = self::encryption($value);
            $expire = time() + $expire;

            return setcookie($name, $value, $expire, $path, $domain, $secure);
        }
        else {
            return false;
        }
    }

    /**
     * 字符串加密
     */
    private static function encryption($string)
    {
        $string = base64_encode($string);
        $code   = '';
        $key    = substr(md5(self::SECRETKEY), 8, 18);
        $strLen = strlen($string);
        $keyLen = strlen($key);
        for ($i = 0; $i < $strLen; $i++) {
            $k = $i % $keyLen;
            $code .= $string[$i] ^ $key[$k];
        }

        return $code;
    }
}