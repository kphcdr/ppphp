<?php
namespace ppphp\comp\event;

/**
 * 事件接口
 *
 * @package ppphp
 */
interface eventInterface
{
    public function getName();
    public function fire();
    public function getListeners();
    public function addListener($eventListener);
}