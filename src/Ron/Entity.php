<?php namespace Ron;

class Entity {

    /**
     * The generated class name
     *
     * @var string
     */
    protected $className;

    /**
     * The valid PHP code associated with this entity
     *
     * @var string
     */
    protected $code;

    /**
     * The EvalWorker instance
     *
     * @var \Ron\EvalWorker
     */
    protected $evalWorker;

    /**
     * The constructor
     *
     * @param string $code
     * @param \Ron\EvalWorker|null $worker
     * @return \Ron\Entity
     */
    public function __construct($code, EvalWorker $worker = null)
    {
        $this->className = $this->generateClassName();

        $this->setCode($code);

        $this->evalWorker = $worker ?: new EvalWorker;
    }

    /**
     * Sets the code
     *
     * @throws \InvalidArgumentException
     * @param string $code
     * @return void
     */
    public function setCode($code)
    {
        if ( ! \is_string($code))
        {
            $message = 'Expected to receive a string, but got '.\gettype($code);

            throw new \InvalidArgumentException($message);
        }

        $this->code = $code;
    }

    /**
     * Returns the code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
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

