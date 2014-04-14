<?php namespace Ron;

class EvalWorker {

    /**
     * Evaluate the code
     *
     * @param string $code
     * @return mixed
     */
    public function evaluate($code)
    {
        return eval($code);
    }

}

