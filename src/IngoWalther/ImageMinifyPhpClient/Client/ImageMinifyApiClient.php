<?php

namespace IngoWalther\ImageMinifyPhpClient\Client;

use IngoWalther\ImageMinifyPhpClient\Api\Api;
use IngoWalther\ImageMinifyPhpClient\Image\Writer;
use IngoWalther\ImageMinifyPhpClient\Response\CompressedImage;

/**
 * Class ImageMinifyApiClient
 * @package IngoWalther\ImageMinifyPhpClient\Client
 */
class ImageMinifyApiClient
{
    /**
     * @var Api
     */
    private $api;

    /**
     * ImageMinifyApiClient constructor.
     * @param string $serverUrl
     * @param string $apiKey
     */
    public function __construct($serverUrl, $apiKey)
    {
        if(!$serverUrl) {
            throw new \InvalidArgumentException('You need to define a server-url');
        }

        if(!$apiKey) {
            throw new \InvalidArgumentException('You need to define an API-Key');
        }

        $this->api = new Api($serverUrl, $apiKey);
    }

    /**
     * @param $imagePath
     * @return CompressedImage
     */
    public function getCompressedImage($imagePath)
    {
        return $this->api->callMinify($imagePath);
    }

    /**
     * @param $imagePath
     * @param $newImagePath
     */
    public function writeCompressedImage($imagePath, $newImagePath)
    {
        $compressedFile = $this->api->callMinify($imagePath);
        $writer = new Writer();
        $writer->write($compressedFile, $newImagePath);

        return true;
    }
}