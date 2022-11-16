<?php

use GlobalXtreme\Response\Constant\ResponseConstant;

if (!function_exists("errOccurred")) {
    function errOccurred($internalMsg = "", $status = null)
    {
        error(ResponseConstant::ERROR, $internalMsg, $status);
    }
}

if (!function_exists("errCredentialIncorrect")) {
    function errCredentialIncorrect($internalMsg = "", $status = 400)
    {
        error(ResponseConstant::GLOBAL['CREDENTIAL_INCORRECT'], $internalMsg, $status);
    }
}

if (!function_exists("errUnableToGenerateToken")) {
    function errUnableToGenerateToken($internalMsg = "", $status = null)
    {
        error(ResponseConstant::GLOBAL['UNABLE_TO_GENERATE_TOKEN'], $internalMsg, $status);
    }
}

if (!function_exists("errUserNotFound")) {
    function errUserNotFound($internalMsg = "", $status = 404)
    {
        error(ResponseConstant::GLOBAL['USER_NOT_FOUND'], $internalMsg, $status);
    }
}

if (!function_exists("errUnauthenticated")) {
    function errUnauthenticated($internalMsg = "", $status = 401)
    {
        error(ResponseConstant::GLOBAL['UNAUTHENTICATED'], $internalMsg, $status);
    }
}

if (!function_exists("errUnableToUploadFile")) {
    function errUnableToUploadFile($internalMsg = "", $status = null)
    {
        error(ResponseConstant::GLOBAL['UNABLE_TO_UPLOAD_FILE'], $internalMsg, $status);
    }
}

if (!function_exists("errNumberGeneratorInvalid")) {
    function errNumberGeneratorInvalid($internalMsg = "", $status = null)
    {
        error(ResponseConstant::GLOBAL['NUMBER_GENERATOR_INVALID'], $internalMsg, $status);
    }
}

if (!function_exists("errPermissionRestricted")) {
    function errPermissionRestricted($internalMsg = "", $status = 401)
    {
        error(ResponseConstant::GLOBAL['PERMISSION_RESTRICTED'], $internalMsg, $status);
    }
}

if (!function_exists("errMessageBrokerFailedNotFound")) {
    function errMessageBrokerFailedNotFound($internalMsg = "", $status = null)
    {
        error(ResponseConstant::GLOBAL['MESSAGE_BROKER_FAILED_NOT_FOUND'], $internalMsg, $status);
    }
}
