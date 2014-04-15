<?php namespace Ron\Builders;

use Ron\Builder;

class ParameterBuilder extends Builder {

    /**
     * The type hint
     *
     * @var string|null
     */
    protected $typeHint = null;

    /**
     * The default value
     *
     * @var mixed
     */
    protected $defaultValue;

    /**
     * Whether the default value was set
     *
     * @var bool
     */
    protected $defaultIsSet = false;

    /**
     * Adds the type hint
     *
     * @param mixed $class
     * @return void
     */
    public function typeHint($class)
    {
        if (\is_object($class)) $class = \get_class($class);

        $this->typeHint = $class;
    }

    /**
     * Sets the default value
     *
     * @param mixed $value
     * @return void
     */
    public function byDefault($value)
    {
        $this->defaultIsSet = true;

        $this->defaultValue = $value;
    }

    /**
     * Builds the class (valid PHP code)
     *
     * @return string
     */
    public function build()
    {
        $default = $this->defaultIsSet ? '= '.\var_export($this->defaultValue, true) : '';

        return \trim(\sprintf('%s $%s %s', $this->typeHint, $this->name, $default));
    }

}

