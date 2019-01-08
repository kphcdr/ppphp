<?php
/**
 * 示例控制器
 */
namespace app\event;

use ppphp\comp\event\eventInterface;
use ppphp\comp\event\eventListenerAbstract;

class testEventListener extends eventListenerAbstract
{
    public function handle(eventInterface $event)
    {
        dump($event->getName());
    }
}
