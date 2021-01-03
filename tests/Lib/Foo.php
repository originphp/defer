<?php
namespace Origin\Test\Defer\Lib;

use Exception;

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


    public function createTempFile()
    {
        $this->tmpFile = sys_get_temp_dir() . '/' . uniqid();
        file_put_contents($this->tmpFile, 'foo');
    }

    public function tempFileExists()
    {
        return file_exists($this->tmpFile);
    }

    public function deleteTempFile()
    {
        return unlink($this->tmpfile);
    }

    public function test()
    {
        defer($a, [$this,'start']);
        defer($a, [$this,'args'], 4, 5, 6, 7);
        defer($a, [$this,'end']);
        defer($a, 'unlink', $this->tmpFile);
        $this->result[] = '---';
    }
}
