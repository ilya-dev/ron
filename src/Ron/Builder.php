<?php namespace Ron;

abstract class Builder {

    /**
     * The class name
     *
     * @var string
     */
    protected $name;

    /**
     * The constructor
     *
     * @param string $name
     * @return \Ron\Builder
     */
    public function __construct($name)
    {
        $this->setName($name);
    }

    /**
     * Builds the class (valid PHP code)
     *
     * @return string
     */
    abstract public function build();

    /**
     * Sets the class name
     *
     * @throws \InvalidArgumentException
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        if ( ! \is_string($name))
        {
            $message = 'Expected to receive a string, but got '.\gettype($name);

            throw new \InvalidArgumentException($message);
        }

        $this->name = $name;
    }

    /**
     * Returns the class name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

}

