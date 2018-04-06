<?php

namespace Core\Exception;

class HttpException extends \Exception {

    private $codeHttp;

    function __construct($codeHttp = 500, Throwable $previous = null) {
        $this->codeHttp = $codeHttp;
        parent::__construct('', 0, $previous);
    }

    function getCodeHttp() {
        return $this->codeHttp;
    }

}
