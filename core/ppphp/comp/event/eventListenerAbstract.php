<?php
namespace ppphp\comp\event;

abstract class eventListenerAbstract implements eventListenerInterface
{
    abstract public function handle(eventInterface $event);
}