<?php

namespace IngoWalther\ImageMinifyPhpClient\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use IngoWalther\ImageMinifyPhpClient\Exception\ApiException;
use IngoWalther\ImageMinifyPhpClient\Response\ResponseBuilder;
use IngoWalther\ImageMinifyPhpClient\Response\CompressedImage;

/**
 * Class Api
 * @package IngoWalther\ImageMinifyPhpClient\Api
 */
class Api
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * Api constructor.
     * @param $serverUrl
     * @param $apiKey
     */
    public function __construct($serverUrl, $apiKey)
    {
        $this->client = new Client(['base_uri' => $serverUrl]);
        $this->apiKey = $apiKey;
    }

    /**
     * @param $imagePath
     * @return CompressedImage
     * @throws ApiException
     */
    public function callMinify($imagePath)
    {
        try {
            $response = $this->makeMinifyRequest($imagePath);
            return $response;
        } catch (BadResponseException $e) {
            $responseBody = $e->getResponse()->getBody()->getContents();

            json_decode($responseBody);
            if (json_last_error() == JSON_ERROR_NONE && strlen($responseBody) > 0) {
                throw new ApiException($responseBody);
            }
            throw $e;
        }
    }

    /**
     * @param $imagePath
     * @return \IngoWalther\ImageMinifyPhpClient\Response\CompressedImage
     */
    private function makeMinifyRequest($imagePath)
    {
        $response = $this->client->request('POST', '/minify', [
            'multipart' => [
                [
                    'name' => 'api_key',
                    'contents' => $this->apiKey,
                ],
                [
                    'name' => 'image',
                    'contents' => fopen($imagePath, 'r'),
                ]
            ]
        ]);
        $responseBuilder = new ResponseBuilder();
        return $responseBuilder->buildResponse($response->getBody()->getContents());
    }

}