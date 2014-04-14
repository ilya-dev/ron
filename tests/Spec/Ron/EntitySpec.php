<?php namespace Spec\Ron;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EntitySpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Ron\Entity');
    }

    function it_picks_a_unique_class_name()
    {
        $this->getClassName()->shouldBeUnique();
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

