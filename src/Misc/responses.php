<?php

use GlobalXtreme\Response\Constant\ResponseConstant;

if (!function_exists("errOccurred")) {
    function errOccurred($internalMsg = "")
    {
        error(ResponseConstant::ERROR, $internalMsg);
    }
}

if (!function_exists("errCredentialIncorrect")) {
    function errCredentialIncorrect($internalMsg = "")
    {
        error(ResponseConstant::GLOBAL['CREDENTIAL_INCORRECT'], $internalMsg);
    }
}

if (!function_exists("errUnableToGenerateToken")) {
    function errUnableToGenerateToken($internalMsg = "")
    {
        error(ResponseConstant::GLOBAL['UNABLE_TO_GENERATE_TOKEN'], $internalMsg);
    }
}

if (!function_exists("errUserNotFound")) {
    function errUserNotFound($internalMsg = "")
    {
        error(ResponseConstant::GLOBAL['USER_NOT_FOUND'], $internalMsg);
    }
}

if (!function_exists("errUnauthenticated")) {
    function errUnauthenticated($internalMsg = "")
    {
        error(ResponseConstant::GLOBAL['UNAUTHENTICATED'], $internalMsg);
    }
}

if (!function_exists("errUnableToUploadFile")) {
    function errUnableToUploadFile($internalMsg = "")
    {
        error(ResponseConstant::GLOBAL['UNABLE_TO_UPLOAD_FILE'], $internalMsg);
    }
}

if (!function_exists("errNumberGeneratorInvalid")) {
    function errNumberGeneratorInvalid($internalMsg = "")
    {
        error(ResponseConstant::GLOBAL['NUMBER_GENERATOR_INVALID'], $internalMsg);
    }
}

if (!function_exists("errPermissionRestricted")) {
    function errPermissionRestricted($internalMsg = "")
    {
        error(ResponseConstant::GLOBAL['PERMISSION_RESTRICTED'], $internalMsg);
    }
}

if (!function_exists("errMessageBrokerFailedNotFound")) {
    function errMessageBrokerFailedNotFound($internalMsg = "", $status = null)
    {
        error(ResponseConstant::GLOBAL['MESSAGE_BROKER_FAILED_NOT_FOUND'], $internalMsg, $status);
    }
}
