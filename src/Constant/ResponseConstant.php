<?php

namespace GlobalXtreme\Response\Constant;

class ResponseConstant
{
    /* -- DEFAULT -- */
    const SUCCESS = ['code' => 200, 'msg' => 'Success'];
    const ERROR = ['code' => 500, 'msg' => 'An error occurred'];

    /* -- GLOBAL -- */
    const GLOBAL = [
        'VALIDATION' => [
            'code' => 'GL0001',
            'msg' => 'Missing required parameter',
        ],
        'CREDENTIAL_INCORRECT' => [
            'code' => 'GL0002',
            'msg' => 'The provided credentials are incorrect',
        ],
        'UNABLE_TO_GENERATE_TOKEN' => [
            'code' => 'GL0003',
            'msg' => 'Unable to generate token',
        ],
        'USER_NOT_FOUND' => [
            'code' => 'GL0004',
            'msg' => 'User request not found. Must be login first',
        ],
        'UNAUTHENTICATED' => [
            'code' => 'GL0005',
            'msg' => 'Unauthenticated.',
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
    ];
}
