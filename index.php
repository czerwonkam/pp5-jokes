<?php
require_once __DIR__.'/vendor/autoload.php';

use Dbabraj\Joke\JokeApi;

$http = new \GuzzleHttp\Client();
$api = new JokeApi($http);

//
$api->all();

echo "Losowy cytat:<br />";
$api->randomJoke();