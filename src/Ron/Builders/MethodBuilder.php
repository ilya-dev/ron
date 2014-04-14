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
     * The parameters
     *
     * @var array
     */
    protected $parameters = [];

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
     * Adds the parameter
     *
     * @param ParameterBuilder $parameter
     * @return void
     */
    public function parameter(ParameterBuilder $parameter)
    {
        $this->parameters[] = $parameter->build();
    }

    /**
     * Builds the class (valid PHP code)
     *
     * @return string
     */
    public function build()
    {
        $parameters = '';

        if ( ! empty($this->parameters))
        {
            $parameters = \implode(', ', $this->parameters);
        }

        return "{$this->visibility} function {$this->name}({$parameters}) {  }";
    }

}

