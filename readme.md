# Image Minify PHP Client

Basic PHP-Implementation of Image Minify API

see https://github.com/ingowalther/image-minify-api

## Installation

```sh
composer require ingowalther/image-minify-php-client
```

## Usage

```php
$client = new \IngoWalther\ImageMinifyPhpClient\Client\ImageMinifyApiClient($serverUrl, $apiKey);
```
|Parameter|Description|
|---------|-----------|
|$serverUrl| The url of your Image Minify API Installation (e.g. http://example.com)|
|$apiKey| Your API-Key| 


### Get compressed image
Returns a "[CompressedImage](https://github.com/ingowalther/image-minify-php-client/blob/master/src/IngoWalther/ImageMinifyPhpClient/Response/CompressedImage.php)" Object

```php
/** @var \IngoWalther\ImageMinifyPhpClient\Response\CompressedImage $compressedImage */
$compressedImage  = $client->getCompressedImage($imagePath);

// The size before compression
$oldSize = $compressedImage->oldSize;

// The size after compression
$newSize = $compressedImage->newSize;

// The saving in percent
$saving = $compressedImage->saving;

// The binary-content of the compressed image
$binaryContent = $compressedImage->binaryContent;
```

### Write compressed image
Compresses the given image and writes the result to the targetpath 
```php
$success = $client->writeCompressedImage($imagePath, $newImagePath);
```
