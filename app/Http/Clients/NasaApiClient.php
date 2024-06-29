<?php

namespace App\Http\Clients;

use App\Http\Interfaces\NasaApiClientInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

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
            Log::error('Error fetching Picture of the Day: ' . $e->getMessage());
            return ['error' => 'Unable to fetch Picture of the Day. Please try again later.'];
        }
    }

    public function getMarsRoverPhotos(): array
    {
        $url = 'https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol=1000&api_key=' . $this->apiKey;
        try {
            $response = $this->client->get($url);
            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            Log::error('Error fetching Mars Rover Photos: ' . $e->getMessage());
            return ['error' => 'Unable to fetch Mars Rover Photos. Please try again later.'];
        }
    }
}
