<?php namespace Ron\Testing;

abstract class DummyAbstract {

    public function wontBeOverridden() {}

    abstract function overrideMe($foo = 'test', $bar);

    abstract function overrideMeToo(\stdClass $baz, \stdClass $wow = null);

}

