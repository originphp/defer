# Defer

![license](https://img.shields.io/badge/license-MIT-brightGreen.svg)
[![build](https://travis-ci.org/originphp/defer.svg?branch=master)](https://travis-ci.org/originphp/defer)
[![coverage](https://coveralls.io/repos/github/originphp/defer/badge.svg?branch=master)](https://coveralls.io/github/originphp/defer?branch=master)

Defer the execution of a function until the surrounding function completes based upon the Go language defer function. Calls are executed in Last In First Out. Defer is usually used for cleanup operations such as closing or unlocking files, even if there is an error.

## Installation

To install this package

```linux
$ composer require originphp/defer
```

## Usage

To defer the execution of a function until the surrounding function completes, calls are executed in Last In First Out order.


```php
public function doSomething()
{
    $fileHandle = fopen($this->filename, 'rt');
    defer($queue, 'fclose', $fileHandle);
    ...
    return $result;
}
```

Or 

```php
defer($var,[$this,'method']);
```
