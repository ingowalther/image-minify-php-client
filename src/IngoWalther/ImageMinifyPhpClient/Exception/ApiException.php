<?php

namespace IngoWalther\ImageMinifyPhpClient\Exception;

/**
 * Class ApiException
 * @package IngoWalther\ImageMinifyPhpClient\Exception
 */
class ApiException extends \Exception
{
    /**
     * ApiException constructor.
     * @param string $response
     */
    public function __construct($response)
    {
        $data = json_decode($response);
        parent::__construct($data->message, $data->code);
    }
}