<?php

namespace IngoWalther\ImageMinifyPhpClient\Image;

use IngoWalther\ImageMinifyPhpClient\Response\CompressedImage;

/**
 * Class Writer
 * @package IngoWalther\ImageMinifyPhpClient\Image
 */
class Writer
{
    /**
     * @param CompressedImage $compressedImage
     * @param $path
     * @throws \Exception
     */
    public function write(CompressedImage $compressedImage, $path)
    {
        $success = file_put_contents($path, $compressedImage->binaryContent);

        if(!$success) {
            throw new \Exception(sprintf('Could not write file "%s"', $path));
        }
    }

}