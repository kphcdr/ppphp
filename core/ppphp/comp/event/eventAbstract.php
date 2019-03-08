<?php
namespace ppphp\comp\event;

abstract class eventAbstract implements eventInterface
{
    protected $name;
    /**
     * 监听器存储
     *
     * @var array
     */
    protected $listeners;

    public function fire()
    {
        array_walk($this->listeners, function ($listener) {
            /** @var eventListenerInterface $listener */
            $listener = new $listener;
            $listener->handle($this);
        });
    }

    public function getName()
    {
        return $this->name;
    }

    public function getListeners()
    {
        return $this->listeners;
    }

    public function addListener($eventListener)
    {
        $this->listeners[] = $eventListener;
    }
}