<?php

namespace GlobalXtreme\Response\Contract;

interface Status
{
    public function setDefaultStatus();

    /**
     * @param string $internalMsg
     */
    public function setInternalMessage(string $internalMsg = '');

    /**
     * @param array|null $attributes
     */
    public function setAttributes(array|null $attributes = []);

    public function result();

}
