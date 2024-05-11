<?php

namespace GlobalXtreme\Response;

use GlobalXtreme\Response\Builder\ResponseBuilder;
use GlobalXtreme\Response\Constant\ResponseConstant;
use GlobalXtreme\Response\Contract\Status;
use Illuminate\Http\JsonResponse;

abstract class AbstractResponse implements Contract\AbstractResponse
{
    /**
     * @param Status $status
     * @param $data
     * @param $pagination
     * @param int|null $httpStatus
     *
     * @return JsonResponse|mixed
     */
    public static function json(Status $status = null, $data = null, $pagination = null)
    {
        $builder = new ResponseBuilder();

        $builder->setStatus($status);
        $builder->setData($data);
        $builder->setPagination($pagination);

        if (!$builder->parse->pagination) {
            unset($builder->parse->pagination);
        }

        return (new static)->handle($builder);
    }

    /**
     * @param Status $status
     * @param $data
     * @param $pagination
     * @param int|null $httpStatus
     *
     * @return JsonResponse|mixed
     */
    public static function object(Status $status = null, $data = null, $pagination = null)
    {
        $builder = new ResponseBuilder();

        $builder->setStatus($status);
        $builder->setData($data);
        $builder->setPagination($pagination);
        $builder->isDataObject();

        if (!$builder->parse->pagination) {
            unset($builder->parse->pagination);
        }

        return (new static)->handle($builder);
    }

    abstract public function handle(ResponseBuilder $builder);

}
