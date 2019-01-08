<?php
/**
 * 示例控制器
 */
namespace app\event;

use ppphp\comp\event\eventAbstract;

class testEvent extends eventAbstract
{

    protected $name = "testEvent";
    protected $eventData;
    protected $listeners = [
        testEventListener::class,
    ];
}
