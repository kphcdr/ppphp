<?php
/**
 * 示例event
 */
namespace app\event;

use ppphp\comp\event\eventAbstract;

class testEvent extends eventAbstract
{
    public $id;
    public $data;
    protected $name = "testEvent";
    protected $listeners = [
        testEventListener::class,
    ];

    /**
     * testEvent constructor.
     *
     * @param int $id
     * @param     $data
     */
    public function __construct($id, $data)
    {
        $this->id   = $id;
        $this->data = $data;
    }


}
