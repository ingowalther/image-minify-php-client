<?php

namespace IngoWalther\ImageMinifyPhpClient\Response;

/**
 * Class CompressedImage
 * @package IngoWalther\ImageMinifyPhpClient\Response
 */
class CompressedImage
{
    /**
     * @var int
     */
    public $oldSize = 0;

    /**
     * @var int
     */
    public $newSize = 0;

    /**
     * @var string
     */
    public $binaryContent = '';

}