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
     * Adds the type hint
     *
     * @param string $class
     * @return void
     */
    public function typeHint($class)
    {
        $this->typeHint = $class;
    }

    /**
     * Builds the class (valid PHP code)
     *
     * @return string
     */
    public function build()
    {
        return \trim(\sprintf('%s $%s', $this->typeHint, $this->name));
    }

}

