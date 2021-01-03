<?php
/**
 * OriginPHP Framework
 * Copyright 2018 - 2019 Jamiel Sharief.
 *
 * Licensed under The MIT License
 * The above copyright notice and this permission notice shall be included in all copies or substantial
 * portions of the Software.
 *
 * @copyright   Copyright (c) Jamiel Sharief
 * @link        https://www.originphp.com
 * @license     https://opensource.org/licenses/mit-license.php MIT License
 */

namespace Origin\Test\Defer;

use Origin\Test\Defer\Lib\Foo;

class DeferTest extends \PHPUnit\Framework\TestCase
{
    public function testDefer()
    {
        $foo = new Foo();

        $foo->createTempFile();
        $this->assertTrue($foo->tempFileExists());

        $foo->test();
        $expected = ['---','end','args','start'];
    
        $this->assertEquals($expected, $foo->result);
        $this->assertEquals([4,5,6,7], $foo->args);

        $this->assertFalse($foo->tempFileExists());
    }
}
