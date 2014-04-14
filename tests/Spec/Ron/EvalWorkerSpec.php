<?php namespace Spec\Ron;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EvalWorkerSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Ron\EvalWorker');
    }

    function it_evaluates_the_code()
    {
        $this->evaluate('return 2 + 2;')->shouldReturn(4);
    }

}

