<?php

namespace GlobalXtreme\Response\Builder;

use GlobalXtreme\Parser\Parser;
use GlobalXtreme\Response\Constant\ResponseConstant;
use GlobalXtreme\Response\Contract\ResponseBuilder as ResponseBuilderContract;
use GlobalXtreme\Response\Contract\Status;
use GlobalXtreme\Response\Parse\ResponseParse;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;

class ResponseBuilder implements ResponseBuilderContract
{
    /**
     * @var ResponseParse
     */
    public ResponseParse $parse;

    /**
     * @var bool
     */
    public bool $isObject = false;

    /**
     * @var int
     */
    public int $httpStatus = ResponseConstant::HTTP_STATUS_CODE['SUCCESS'];


    public function __construct()
    {
        $this->parse = new ResponseParse();
    }


    /**
     * @param Status|null $status
     *
     * @return void
     */
    public function setStatus(Status|null $status = null)
    {
        if (!$status) {
            $status = new \GlobalXtreme\Response\Status();
        }

        if ($status->success) {
            $this->parse->status = $status->result();
        }
    }

    /**
     * @param $data
     *
     * @return void
     */
    public function setData($data)
    {
        if ($data instanceof LengthAwarePaginator) {
            $this->setPagination($data);
        }

        $this->parse->result = is_array($data) ? $data : Parser::response($data);
    }

    /**
     * @param $data
     *
     * @return array|void
     */
    public function setPagination($data)
    {
        if (!$data) {
            return;
        }

        if (is_array($data) && array_key_exists('totalPages', $data)) {
            $this->parse->pagination = $data;
            return;
        }

        if (!($data instanceof LengthAwarePaginator)) {
            return;
        }

        if ($this->parse->pagination) {
            return;
        }

        $this->parse->pagination = pagination($data);
    }

    /**
     * @param int $status
     *
     * @return void
     */
    public function setHttpStatus(int $status)
    {
        $this->httpStatus = $status;
    }

    /**
     * @return void
     */
    public function isDataObject()
    {
        $this->isObject = true;
    }

    /**
     * @param ResponseBuilderContract $builder
     *
     * @return ResponseParse|JsonResponse|mixed
     */
    public function parseToResponse(ResponseBuilderContract $builder)
    {
        $parse = $builder->parse;
        if (!$builder->isObject) {
            return response()->json($parse, $this->httpStatus);
        }

        return $parse;
    }

}
