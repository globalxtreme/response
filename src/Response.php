<?php

namespace GlobalXtreme\Response;

use GlobalXtreme\Response\Contract\ResponseBuilder;
use GlobalXtreme\Response\Parse\ResponseParse;
use Illuminate\Http\JsonResponse;

class Response extends AbstractResponse
{
    /**
     * @param ResponseBuilder $builder
     *
     * @return ResponseParse|JsonResponse|mixed
     */
    public function handle(ResponseBuilder $builder)
    {
        return $builder->parseToResponse($builder);
    }

}
