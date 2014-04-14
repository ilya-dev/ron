<?php namespace Spec\Ron;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EntitySpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Ron\Entity');
    }



}

