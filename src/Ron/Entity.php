<?php namespace Ron;

class Entity {

    /**
     * The generated class name
     *
     * @var string
     */
    protected $className;

    /**
     * The constructor
     *
     * @return \Ron\Entity
     */
    public function __construct()
    {
        $this->className = $this->generateClassName();
    }

    /**
     * Returns the class name
     *
     * @return string
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * Generate the unique class name
     *
     * @return string
     */
    protected function generateClassName()
    {
        do
        {
            $name = \uniqid('class_', true);
        }
        while (\class_exists($name));

        return $name;
    }

}

