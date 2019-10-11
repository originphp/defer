<?php
namespace Origin\Test\Defer\Lib;

class Foo
{
    public $result = [];
    public $args = [];

    public function start()
    {
        $this->result[] = 'start';
    }
    public function end()
    {
        $this->result[] = 'end';
    }

    public function args()
    {
        $this->args = func_get_args();
        $this->result[] = 'args';
    }

    public function test()
    {
        defer($a, [$this,'start']);
        defer($a, [$this,'args'], 4, 5, 6, 7);
        defer($a, [$this,'end']);
        $this->result[] = '---';
    }
}
