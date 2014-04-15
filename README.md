# Ron

> Ron allows you to override abstract methods and implement interfaces in... run time! How cool is that?

## Installation

Ron requires PHP `>=5.4.0`.


You can grab Ron using [Composer](https://getcomposer.org): `composer require "ilya/ron:0.1.*"`.

## Use

First, create an interface or an abstract class:

```php
<?php namespace demo;

interface Foo {
    public function bar(stdClass $so, $amaze = null);
}

abstract class Baz {
    abstract protected function wow($such, stdClass $doge = null); 
}

```

Then you need to "wrap" them into `\ReflectionClass`, like so:


```php
// you could pass "demo\Foo" as the argument instead
$ron = new \Ron\Ron(new \ReflectionClass('demo\Baz'));
```


So now that you've successfully created an instance of `\Ron\Ron`, you can call the method `create` on it.


```php
$entity = $ron->create();
```

Now that the `$entity` variable has type `\Ron\Entity`, here is what you can do:

+ `getCode()`: returns the valid PHP class declaration
+ `apply()`: evaluates the code using `eval`
+ `getClassName()`: returns the class name used (e.g. `class\_ff3453363262dssfwgw`)  

To finish, let me show you just a very basic example:


```php
$methods = ['wow' => 'Hello, world!'];

$entity = (new \Ron\Ron(new \ReflectionClass('demo\Baz')))->create($methods);

$entity->apply();
$name = $entity->getClassName();

(new $name)->wow('Hey!'); // Hello, world!
```

That's it, have any questions?

## License

Ron is licensed under the MIT license.

