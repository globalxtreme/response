<?php

namespace GlobalXtreme\Response\Constant;

class ResponseConstant
{
    /** --- HTTP STATUS CODE --- */
    const HTTP_STATUS_CODE = [
        'SUCCESS' => 200,
        'BAD_REQUEST' => 400,
        'INTERNAL_SERVER_ERROR' => 500
    ];

    /** --- DEFAULT --- */
    const SUCCESS = ['code' => self::HTTP_STATUS_CODE['SUCCESS'], 'msg' => 'Success'];
    const ERROR = ['code' => 'ERR000', 'msg' => 'An error occurred'];

    /** --- GLOBAL --- */
    const GLOBAL = [
        'VALIDATION' => [
            'code' => 'GL0001',
            'msg' => 'Missing required parameter',
        ],
        'CREDENTIAL_INCORRECT' => [
            'code' => 'GL0002',
            'msg' => 'The credentials provided are incorrect',
        ],
        'UNABLE_TO_GENERATE_TOKEN' => [
            'code' => 'GL0003',
            'msg' => 'Unable to generate token',
        ],
        'USER_NOT_FOUND' => [
            'code' => 'GL0004',
            'msg' => 'User not found. Must be login first',
        ],
        'UNAUTHENTICATED' => [
            'code' => 'GL0005',
            'msg' => 'Invalid token. Please re-login!!',
        ],
        'UNABLE_TO_UPLOAD_FILE' => [
            'code' => 'GL0006',
            'msg' => 'Unable to upload file',
        ],
        'NUMBER_GENERATOR_INVALID' => [
            'code' => 'GL0007',
            'msg' => 'Number generator invalid',
        ],
        'PERMISSION_RESTRICTED' => [
            'code' => 'GL0008',
            'msg' => 'Error. User\'s permission restricted',
        ],
        'MESSAGE_BROKER_FAILED_NOT_FOUND' => [
            'code' => 'GL0009',
            'msg' => 'Message broker not found'
        ],
    ];
}
