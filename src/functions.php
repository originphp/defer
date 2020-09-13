<?php
declare(strict_types = 1);
/**
 * OriginPHP Framework
 * Copyright 2018 - 2020 Jamiel Sharief.
 *
 * Licensed under The MIT License
 * The above copyright notice and this permission notice shall be included in all copies or substantial
 * portions of the Software.
 *
 * @copyright   Copyright (c) Jamiel Sharief
 * @link        https://www.originphp.com
 * @license     https://opensource.org/licenses/mit-license.php MIT License
 */
use Origin\Defer\DeferredFunction;

/**
 * Defer the execution of a function until the surrounding function completes.
 * Function calls are executed in Last In First Out. Defer is usually used for
 * cleanup operations such as closing or unlocking files, even if there is an error.
 *
 * @example defer($queue,[$this,'method'],'arg1','arg2');
 *
 * @param array|null $context A variable to defer functions into
 * @param callable|string $callable [$this,'method'] or string function e.g. fclose or MyClass::myCallbackMethod
 * @return void
 */
function defer(?array &$context, $callable) : void
{
    if ($context === null) {
        $context = [];
    }

    if (is_string($callable)) {
        $callable = function () use ($callable) {
            $arguments = func_get_args();
            call_user_func($callable, ...$arguments);
        };
    }

    $arguments = func_get_args();
    array_shift($arguments);
    array_shift($arguments);
    
    array_unshift($context, new DeferredFunction($callable, $arguments));
}
