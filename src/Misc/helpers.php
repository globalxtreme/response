<?php

use GlobalXtreme\Response\Response;
use GlobalXtreme\Response\Status;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

if (!function_exists("success")) {

    /**
     * @param $data
     * @param array|null $success
     * @param string|null $internalMsg
     * @param array|null $attributes
     * @param bool $isObject
     * @param array|null $pagination
     *
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    function success($data = null, array|null $success = null, string|null $internalMsg = null, array|null $attributes = null, bool $isObject = false, array|null $pagination = null)
    {
        $success = $success ?: \GlobalXtreme\Response\Constant\ResponseConstant::SUCCESS;

        $status = new Status(true, $success, $internalMsg, $attributes);

        $method = $isObject ? "object" : "json";
        return Response::$method($status, $data, $pagination);
    }

}

if (!function_exists("error")) {

    /**
     * @param array|null $error
     * @param string|null $internalMsg
     * @param array|null $attributes
     *
     * @return \Illuminate\Http\JsonResponse|mixed
     * @throws ErrorException
     */
    function error(array|null $error = null, string|null $internalMsg = null, array|null $attributes = null)
    {
        $error = $error ?: \GlobalXtreme\Response\Constant\ResponseConstant::ERROR;
        throw new ErrorException($error, $internalMsg, $attributes);
    }

}

if (!function_exists("exception")) {

    /**
     * @param $exception
     *
     * @return mixed
     */
    function exception($exception)
    {
        throw $exception;
    }

}

if (!function_exists("pagination")) {

    /**
     * @param $data
     *
     * @return array|null
     */
    function pagination($data)
    {
        if ($data instanceof LengthAwarePaginator) {
            return [
                'count' => $data->count(),
                'currentPage' => $data->currentPage(),
                'links' => [
                    'next' => $data->nextPageUrl(),
                    'previous' => $data->previousPageUrl()
                ],
                'perPage' => $data->perPage(),
                'total' => $data->total(),
                'totalPages' => $data->lastPage()
            ];
        }

        return null;
    }

}
