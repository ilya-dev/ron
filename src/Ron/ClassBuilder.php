<?php namespace Ron;

class ClassBuilder {

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
     * @return \Ron\ClassBuilder
     */
    public function __construct($name)
    {
        $this->setName($name);
    }

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

