<?php

namespace GlobalXtreme\Response\Exception;

use GlobalXtreme\Response\Constant\ResponseConstant;
use GlobalXtreme\Response\Response;
use GlobalXtreme\Response\Status;
use Exception;

class ErrorException extends Exception
{
    /**
     * @param array $error
     * @param string|null $internalMsg
     * @param int|null $httpStatus
     * @param array|null $attributes
     */
    public function __construct(public array       $error,
                                public string|null $internalMsg = null,
                                public int|null    $httpStatus = null,
                                public array|null  $attributes = null)
    {
        error_reporting(0);

        if (!$this->httpStatus) {
            $this->httpStatus = ResponseConstant::HTTP_STATUS_CODE['INTERNAL_SERVER_ERROR'];
        }

        $message = $this->error['msg'];
        if ($this->internalMsg) {
            $message .= ". $this->internalMsg";
        }

        parent::__construct("$message. Code: $this->httpStatus");
    }


    /**
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function render()
    {
        $error = new Status(false, $this->error, $this->internalMsg, $this->attributes);
        return Response::json($error, httpStatus: $this->httpStatus);
    }

}
