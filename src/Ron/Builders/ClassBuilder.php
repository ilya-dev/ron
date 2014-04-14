<?php namespace Ron\Builders;

use Ron\Builder;

class ClassBuilder extends Builder {

    /**
     * The interfaces this class implements
     *
     * @var array
     */
    protected $interfaces;

    /**
     * The classes this class extends
     *
     * @var array
     */
    protected $classes;

    /**
     * The constructor
     *
     * @param string $name
     * @return \Ron\Builders\ClassBuilder
     */
    public function __construct($name)
    {
        parent::__construct($name);

        $this->interfaces = [];

        $this->classes = [];
    }

    /**
     * Builds the class (valid PHP code)
     *
     * @return string
     */
    public function build()
    {
        $implements = '';

        $extends = '';

        if ( ! empty($this->interfaces))
        {
            $implements = ' implements '.\implode(', ', $this->interfaces);
        }

        if ( ! empty($this->classes))
        {
            $extends = ' extends '.\implode(', ', $this->classes);
        }

        return "class {$this->name}{$extends}{$implements} {  }";
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

