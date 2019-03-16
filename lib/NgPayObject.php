<?php
namespace ngpay;

class NgPayObject
{
    /**
     * Create an object from array
     * @param $array
     * @return $this
     * @throws \ReflectionException
     */
    public static function fromArray($array) {
        $mapper = new JsonMapper();
        $class = get_called_class();
        return $mapper->map(
            $array,
            new $class()
        );
    }
}