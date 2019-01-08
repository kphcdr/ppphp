<?php
/**
 * 示例监听器
 */
namespace app\event;

use ppphp\comp\event\eventInterface;
use ppphp\comp\event\eventListenerAbstract;

class testEventListener extends eventListenerAbstract
{
    protected $event;

    /**
     * @param testEvent $event
     */
    public function handle(eventInterface $event)
    {
        dump($event->id,$event->data);
    }
}
