<?php

namespace GlobalXtreme\Response\Contract;

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
     * @return void
     */
    public function result();

}
