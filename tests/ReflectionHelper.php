<?php

namespace Sharemat\Sdk\Tests;

/**
 * This is super JoliCode !
 * src: https://jolicode.com/blog/ameliorer-la-dx-de-vos-fixtures-php.
 */
class ReflectionHelper
{
    public static function setProperty(object $object, string $property, $value)
    {
        $reflectionProperty = new \ReflectionProperty(\get_class($object), $property);
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($object, $value);
    }

    public static function getProperty(object $object, string $property, ?string $class = null)
    {
        $reflectionProperty = new \ReflectionProperty($class ?: \get_class($object), $property);
        $reflectionProperty->setAccessible(true);

        return $reflectionProperty->getValue($object);
    }

    public static function callMethod(object $object, string $method, ...$args)
    {
        $r = new \ReflectionObject($object);
        $m = $r->getMethod($method);
        $m->setAccessible(true);

        return $m->invoke($object, ...$args);
    }

    public static function createWithoutConstructor(string $class): object
    {
        $r = new \ReflectionClass($class);

        return $r->newInstanceWithoutConstructor();
    }
}
