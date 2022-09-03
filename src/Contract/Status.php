<?php

namespace GlobalXtreme\Response\Contract;

use GlobalXtreme\Response\Parse\StatusParse;

interface Status
{
    /**
     * @return void
     */
    public function setDefaultStatus();

    /**
     * @param string $internalMsg
     *
     * @return void
     */
    public function setInternalMessage(string $internalMsg = '');

    /**
     * @param array|null $attributes
     *
     * @return void
     */
    public function setAttributes(array|null $attributes = []);

    /**
     * @return StatusParse
     */
    public function result();

}
