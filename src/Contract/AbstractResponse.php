<?php

namespace GlobalXtreme\Response\Contract;

interface AbstractResponse
{
    /**
     * @param Status|null $status
     * @param $data
     * @param $pagination
     *
     * @return mixed
     */
    public static function json(Status|null $status, $data = null, $pagination = null);

    /**
     * @param Status|null $status
     * @param $data
     * @param $pagination
     *
     * @return mixed
     */
    public static function object(Status|null $status, $data = null, $pagination = null);

}
