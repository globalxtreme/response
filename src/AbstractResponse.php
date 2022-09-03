<?php

namespace GlobalXtreme\Response;

use GlobalXtreme\Response\Builder\ResponseBuilder;
use GlobalXtreme\Response\Constant\ResponseConstant;
use GlobalXtreme\Response\Contract\Status;
use Illuminate\Http\JsonResponse;

abstract class AbstractResponse implements Contract\AbstractResponse
{
    /**
     * @param Status|null $status
     * @param $data
     * @param $pagination
     * @param int $httpStatus
     *
     * @return JsonResponse|mixed
     */
    public static function json(Status|null $status = null, $data = null, $pagination = null, int $httpStatus = ResponseConstant::HTTP_STATUS_CODE['SUCCESS'])
    {
        $builder = new ResponseBuilder();

        $builder->setStatus($status);
        $builder->setData($data);
        $builder->setPagination($pagination);
        $builder->setHttpStatusCode($httpStatus);

        if (!$builder->parse->pagination) {
            unset($builder->parse->pagination);
        }

        return (new static)->handle($builder);
    }

    /**
     * @param Status|null $status
     * @param $data
     * @param $pagination
     * @param int $httpStatus
     *
     * @return JsonResponse|mixed
     */
    public static function object(Status|null $status = null, $data = null, $pagination = null, int $httpStatus = ResponseConstant::HTTP_STATUS_CODE['SUCCESS'])
    {
        $builder = new ResponseBuilder();

        $builder->setStatus($status);
        $builder->setData($data);
        $builder->setPagination($pagination);
        $builder->setHttpStatusCode($httpStatus);
        $builder->isDataObject();

        if (!$builder->parse->pagination) {
            unset($builder->parse->pagination);
        }

        return (new static)->handle($builder);
    }

    abstract public function handle(ResponseBuilder $builder);

}
