<?php namespace Ron\Builders;

use Ron\Builder;

class ClassBuilder extends Builder {

    /**
     * The interfaces this class implements
     *
     * @var array
     */
    protected $interfaces = [];

    /**
     * The classes this class extends
     *
     * @var array
     */
    protected $classes = [];

    /**
     * The methods
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

        if ( ! empty($this->interfaces))
        {
            $implements = ' implements '.\implode(', ', $this->interfaces);
        }

        if ( ! empty($this->classes))
        {
            $extends = ' extends '.\implode(', ', $this->classes);
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
        $this->interfaces[] = $interface;
    }

    /**
     * "Extends" a class
     *
     * @param string $class
     * @return void
     */
    public function extend($class)
    {
        $this->classes[] = $class;
    }

}

