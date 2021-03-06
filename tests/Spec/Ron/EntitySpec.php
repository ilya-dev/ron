<?php namespace Spec\Ron;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ron\EvalWorker;

class EntitySpec extends ObjectBehavior {

    function let(EvalWorker $worker)
    {
        $this->beConstructedWith('some code', $worker);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ron\Entity');
    }

    function it_sets_and_returns_the_code()
    {
        $this->shouldThrow($e = 'InvalidArgumentException')->duringSetCode(null);

        $this->shouldNotThrow($e)->duringSetCode($code = 'dumb code');

        $this->getCode()->shouldBeEqualTo($code);
    }

    function it_picks_a_unique_class_name()
    {
        $this->getClassName()->shouldBeUnique();
    }

    function it_evaluates_the_code_using_the_EvalWorker(EvalWorker $worker)
    {
        $worker->evaluate('some code')->shouldBeCalled();

        $this->apply();
    }

    function it_resolves_naming_conflicts()
    {
        $this->setCode($code = 'class foo {  }');

        $this->resolveNamingConflicts();

        $this->getCode()->shouldNotBeEqualTo($code);
    }

    /**
     * Returns the inline matchers
     *
     * @return array
     */
    public function getMatchers()
    {
        return [
            'beUnique' => function($subject)
            {
                return ! \class_exists($subject);
            },
        ];
    }

}

