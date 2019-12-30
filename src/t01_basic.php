<?php

require_once 'vendor/autoload.php';

use Crew\Unsplash\HttpClient;
use Crew\Unsplash\Search;
use Dotenv\Dotenv;

// load env variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$accessKey = getenv('ACCESS_KEY');
$secretKey = getenv('SECRET_KEY');

/**
 * Search Unsplash for photos
 * @param array $accessKey
 * @param array $secretKey
 */
function searchUnsplashPhotos(array $accessKey, array $secretKey, $search, $orientation = 'landscape')
{
    HttpClient::init([
        'applicationId' => $accessKey,
        'secret' => $secretKey,
        'callbackUrl' => '',
        'utmSource' => 'Next Return'
    ]);

    $httpClient = new HttpClient();


    $page = 3;
    $per_page = 15;

    $photos = Search::photos($search, $page, $per_page, $orientation);
    return $photos;
}

searchUnsplashPhotos($accessKey, $secretKey, "forest", "landscape");