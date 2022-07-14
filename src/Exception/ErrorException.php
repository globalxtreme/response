<?php

namespace GlobalXtreme\Response\Exception;

use GlobalXtreme\Response\Response;
use GlobalXtreme\Response\Status;
use Exception;

class ErrorException extends Exception
{
    /**
     * @param array $error
     * @param string|null $internalMsg
     * @param array|null $attributes
     */
    public function __construct(public array       $error,
                                public string|null $internalMsg = null,
                                public array|null  $attributes = null)
    {
        parent::__construct($this->error['msg']);
    }


    /**
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function render()
    {
        $error = new Status(false, $this->error, $this->internalMsg, $this->attributes);
        return Response::json($error);
    }

}
