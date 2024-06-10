<?php

namespace GlobalXtreme\Response\Exception;

use GlobalXtreme\Response\Constant\ResponseConstant;
use GlobalXtreme\Response\Response;
use GlobalXtreme\Response\Status;
use Exception;

class ErrorException extends Exception
{
    /**
     * @param int $httpStatus
     * @param string $message
     * @param string|null $internalMsg
     * @param array|null $attributes
     */
    public function __construct(public int         $httpStatus,
                                string             $message,
                                public string|null $internalMsg = null,
                                public array|null  $attributes = null)
    {
        error_reporting(0);

        parent::__construct($message);
    }


    /**
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function render()
    {
        $error = new Status($this->httpStatus, $this->message, $this->internalMsg, $this->attributes);
        return Response::json($error);
    }

}
