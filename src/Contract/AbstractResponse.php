<?php

namespace GlobalXtreme\Response\Contract;

use GlobalXtreme\Response\Constant\ResponseConstant;

interface AbstractResponse
{
    /**
     * @param Status|null $status
     * @param $data
     * @param $pagination
     * @param int $httpStatus
     *
     * @return mixed
     */
    public static function json(Status|null $status, $data = null, $pagination = null, int $httpStatus = ResponseConstant::HTTP_STATUS_CODE['SUCCESS']);

    /**
     * @param Status|null $status
     * @param $data
     * @param $pagination
     * @param int $httpStatus
     *
     * @return mixed
     */
    public static function object(Status|null $status, $data = null, $pagination = null, int $httpStatus = ResponseConstant::HTTP_STATUS_CODE['SUCCESS']);

}
