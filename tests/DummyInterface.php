<?php namespace Ron\Testing;

interface DummyInterface {

    public function foo($bar, $baz = 42);

    public function bar();

    public function baz(\stdClass $wow = null, $amaze);

}

