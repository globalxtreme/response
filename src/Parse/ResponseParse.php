<?php

namespace GlobalXtreme\Response\Parse;

class ResponseParse
{
    /**
     * @var string
     */
    public string $status = 'success';

    /**
     * @var StatusParse|null
     */
    public StatusParse|null $success = null;

    /**
     * @var StatusParse|null
     */
    public StatusParse|null $error = null;

    /**
     * @var array|object|null
     */
    public array|object|null $result = null;

    /**
     * @var array|null
     */
    public array|null $pagination = null;

}
