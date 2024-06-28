<?php

namespace App\Http\Clients;

use App\Http\Interfaces\NasaApiClientInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class NasaApiClient implements NasaApiClientInterface
{
    private Client $client;
    private string $apiKey;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->apiKey = config('services.nasa.api_key');
    }

    public function getPictureOfTheDay(): array
    {
        $url = 'https://api.nasa.gov/planetary/apod?api_key=' . $this->apiKey;
        try {
            $response = $this->client->get($url);
            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            // Handle the exception or log it
            return [];
        }
    }
}
