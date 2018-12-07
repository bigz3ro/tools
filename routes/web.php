<?php
use GuzzleHttp\Client;

$client = new Client([
    'headers' => [ 'Content-Type' => 'application/json' ]
]);
$body = [];
$body['username'] = "admin";
$body['password'] = "admin,./<>?123";
$url = 'http://35.240.210.144:5000/login';
$res = $client->post($url,
     ['body' => json_encode($body)]
);
$data = json_decode($res->getBody());
$jwtToken = $data->token;

$urlFilm = 'http://35.240.210.144:5000/movies';
$header = [ 'Authorization' => 'Bearer ' . $jwtToken ];
$response = $client->get($urlFilm, array('headers' => $header));
$movies = $response->getBody()->getContents();

dd(json_decode($movies));