<?php namespace Ron\Builders;

use Ron\Builder;

class ClassBuilder extends Builder {

    /**
     * The interface this class implements
     *
     * @var null|string
     */
    protected $interface = null;

    /**
     * The class this class extends
     *
     * @var null|string
     */
    protected $class = null;

    /**
     * The methods this class has
     *
     * @var array
     */
    protected $methods = [];

    /**
     * Builds the class (valid PHP code)
     *
     * @return string
     */
    public function build()
    {
        $implements = '';

        $extends = '';

        $methods = '';

        if ( ! empty($this->interface))
        {
            $implements = ' implements '.$this->interface;
        }

        if ( ! empty($this->class))
        {
            $extends = ' extends '.$this->class;
        }

        if ( ! empty($this->methods))
        {
            $methods = \implode(' ', $this->methods);
        }

        return "class {$this->name}{$extends}{$implements} { {$methods} }";
    }

    /**
     * Adds the method
     *
     * @param MethodBuilder $method
     * @return void
     */
    public function method(MethodBuilder $method)
    {
        $this->methods[] = $method->build();
    }

    /**
     * "Implements" an interface
     *
     * @param string $interface
     * @return void
     */
    public function implement($interface)
    {
        $this->interface = $interface;
    }

    /**
     * "Extends" a class
     *
     * @param string $class
     * @return void
     */
    public function extend($class)
    {
        $this->class = $class;
    }

}

