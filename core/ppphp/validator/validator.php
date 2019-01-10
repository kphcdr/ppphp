<?php
/* ========================================================================
 * env 系统环境类
 * ======================================================================== */
namespace ppphp\validator;


abstract class validator implements \ArrayAccess
{
    public function __construct(array $data)
    {
        array_walk($data, function ($v, $k) {

            if (property_exists($this, $k)) {
                $this->{$k} = $v;
            }
        });
    }

    abstract public function valid();

    public function offsetExists($offset)
    {
        if(property_exists($this,$offset)) {
            return true;
        }
        return false;
    }

    public function offsetGet($offset)
    {
        if(property_exists($this,$offset)) {
            return $this->{$offset};
        }

        return null;
    }

    public function offsetSet($offset, $value)
    {
        if(property_exists($this,$offset)) {
            $this->{$offset} = $value;
        }
    }

    public function offsetUnset($offset)
    {
        if(property_exists($this,$offset)) {
            unset($this->{$offset});
        }
    }

    public function toArray()
    {
        $array = [];
        foreach($this as $k=>$v) {
            $array[$k] = $v;
        }

        return $array;
    }


}