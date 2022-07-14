<?php

namespace GlobalXtreme\Response\Builder;

use App\Services\Parser\Parser;
use GlobalXtreme\Response\Contract\ResponseBuilder as ResponseBuilderContract;
use GlobalXtreme\Response\Contract\Status;
use GlobalXtreme\Response\Parse\ResponseParse;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

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
            $status = new Success();
        }

        if ($status instanceof Success) {
            $this->parse->success = $status->result();
        }

        if ($status instanceof Error) {
            $this->parse->error = $status->result();
            $this->parse->status = 'error';
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
            return response()->json($parse, 200);
        }

        return $parse;
    }

}
