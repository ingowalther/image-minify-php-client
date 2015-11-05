<?php

namespace IngoWalther\ImageMinifyPhpClient\Response;

/**
 * Class ResponseBuilder
 * @package IngoWalther\ImageMinifyPhpClient\Response
 */
class ResponseBuilder
{
    /**
     * @param $json
     * @return CompressedImage
     */
    public function buildResponse($json)
    {
        $data = json_decode($json);

        $compressedImage = new CompressedImage();
        $compressedImage->newSize = $data->newSize;
        $compressedImage->oldSize = $data->oldSize;
        $compressedImage->binaryContent = base64_decode($data->image);

        return $compressedImage;
    }
}