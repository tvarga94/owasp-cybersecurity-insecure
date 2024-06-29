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

    public function getEarthImagery(float $lat, float $lon, string $date): array
    {
        $url = 'https://api.nasa.gov/planetary/earth/assets?lon=' . $lon . '&lat=' . $lat . '&date=' . $date . '&api_key=' . $this->apiKey;
        try {
            $response = $this->client->get($url);
            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            Log::error('Error fetching Earth Imagery: ' . $e->getMessage());
            return ['error' => 'Unable to fetch Earth Imagery. Please try again later.'];
        }
    }

    public function getAsteroids(): array
    {
        $url = 'https://api.nasa.gov/neo/rest/v1/feed?start_date=' . date('Y-m-d') . '&api_key=' . $this->apiKey;
        try {
            $response = $this->client->get($url);
            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            Log::error('Error fetching Asteroids: ' . $e->getMessage());
            return ['error' => 'Unable to fetch Asteroids. Please try again later.'];
        }
    }

    public function getEPIC(): array
    {
        $url = 'https://api.nasa.gov/EPIC/api/natural/images?api_key=' . $this->apiKey;
        try {
            $response = $this->client->get($url);
            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            Log::error('Error fetching EPIC: ' . $e->getMessage());
            return ['error' => 'Unable to fetch EPIC. Please try again later.'];
        }
    }
}
