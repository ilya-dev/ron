<?php namespace Ron\Builders;

use Ron\Builder;

class MethodBuilder extends Builder {

    /**
     * The method's visibility mode
     *
     * @var string
     */
    protected $visibility = 'public';

    /**
     * Sets the visibility mode
     *
     * @param string $mode
     * @throws \UnexpectedValueException
     * @return void
     */
    public function visibility($mode)
    {
        if ( ! \in_array($mode, ['public', 'protected', 'private']))
        {
            throw new \UnexpectedValueException('Incorrect visibility '.$mode);
        }

        $this->visibility = $mode;
    }

    /**
     * Builds the class (valid PHP code)
     *
     * @return string
     */
    public function build()
    {
        return "{$this->visibility} function {$this->name}() {  }";
    }

}

