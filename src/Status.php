<?php

namespace GlobalXtreme\Response;

use GlobalXtreme\Response\Constant\ResponseConstant;
use GlobalXtreme\Response\Parse\StatusParse;

class Status implements Contract\Status
{
    /**
     * @var StatusParse
     */
    public StatusParse $parse;


    /**
     * @param bool $success
     * @param array|null $status
     * @param string|null $internalMsg
     * @param object|array|null $attributes
     */
    public function __construct(public bool              $success = true,
                                public array|null        $status = null,
                                public string|null       $internalMsg = null,
                                public object|array|null $attributes = null)
    {
        if (!$this->status) {
            $this->setDefaultStatus();
        }

        $this->parse = new StatusParse();
    }


    /**
     * @return void
     */
    public function setDefaultStatus()
    {
        $this->status = $this->success ? ResponseConstant::SUCCESS : ResponseConstant::ERROR;
    }

    /**
     * @param string $internalMsg
     *
     * @return void
     */
    public function setInternalMessage(string $internalMsg = '')
    {
        $this->internalMsg = $internalMsg;
    }

    /**
     * @param array|null $attributes
     *
     * @return void
     */
    public function setAttributes(array|null $attributes = [])
    {
        $this->attributes = $attributes;
    }

    /**
     * @return StatusParse
     */
    public function result()
    {
        $this->parse->code = $this->status['code'];
        $this->parse->message = $this->status['msg'];
        $this->parse->internalMsg = $this->internalMsg;
        $this->parse->attributes = $this->attributes;

        return $this->parse;
    }

}
