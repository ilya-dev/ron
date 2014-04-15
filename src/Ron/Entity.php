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

        $this->resolveNamingConflicts();
    }

    /**
     * Makes the code available in runtime
     *
     * @return void
     */
    public function apply()
    {
        $this->evalWorker->evaluate($this->code);
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
     * Modifies the code so it won't produce naming conflicts
     *
     * @return void
     */
    public function resolveNamingConflicts()
    {
        $this->code = \preg_replace('/^class (\w+)/', $this->className, $this->code);
    }

    /**
     * Generates the unique class name
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

        return \preg_replace('/[^a-z0-9]/i', '', $name);
    }

}

