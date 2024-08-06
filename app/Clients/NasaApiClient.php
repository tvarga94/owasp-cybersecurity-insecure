<?php

declare(strict_types=1);

namespace App\Clients;

use App\Interfaces\NasaApiRepositoryInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class NasaApiClient implements NasaApiRepositoryInterface
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
        $url = 'https://api.nasa.gov/planetary/apod?api_key='.$this->apiKey;
        try {
            $response = $this->client->get($url);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            Log::error('Error fetching Picture of the Day: '.$e->getMessage());

            return ['error' => 'Unable to fetch Picture of the Day. Please try again later.'];
        }
    }

    public function getMarsRoverPhotos(): array
    {
        $url = 'https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol=1000&api_key='.$this->apiKey;
        try {
            $response = $this->client->get($url);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            Log::error('Error fetching Mars Rover Photos: '.$e->getMessage());

            return ['error' => 'Unable to fetch Mars Rover Photos. Please try again later.'];
        }
    }

    public function getEarthImagery(float $lat, float $lon, string $date): array
    {
        $url = 'https://api.nasa.gov/planetary/earth/assets?lon='.$lon.'&lat='.$lat.'&date='.$date.'&api_key='.$this->apiKey;
        try {
            $response = $this->client->get($url);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            Log::error('Error fetching Earth Imagery: '.$e->getMessage());

            return ['error' => 'Unable to fetch Earth Imagery. Please try again later.'];
        }
    }

    public function getAsteroids(): array
    {
        $url = 'https://api.nasa.gov/neo/rest/v1/feed?start_date='.date('Y-m-d').'&api_key='.$this->apiKey;
        try {
            $response = $this->client->get($url);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            Log::error('Error fetching Asteroids: '.$e->getMessage());

            return ['error' => 'Unable to fetch Asteroids. Please try again later.'];
        }
    }

    public function getEPIC(): array
    {
        $url = 'https://api.nasa.gov/EPIC/api/natural/images?api_key='.$this->apiKey;
        try {
            $response = $this->client->get($url);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            Log::error('Error fetching EPIC: '.$e->getMessage());

            return ['error' => 'Unable to fetch EPIC. Please try again later.'];
        }
    }

    public function getMarsWeather(): array
    {
        $url = 'https://api.nasa.gov/insight_weather/?api_key='.$this->apiKey.'&feedtype=json&ver=1.0';
        try {
            $response = $this->client->get($url);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            Log::error('Error fetching Mars Weather: '.$e->getMessage());

            return ['error' => 'Unable to fetch Mars Weather. Please try again later.'];
        }
    }

    public function getNeoFeed(): array
    {
        $url = 'https://api.nasa.gov/neo/rest/v1/feed?api_key='.$this->apiKey;
        try {
            $response = $this->client->get($url);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            Log::error('Error fetching Neo Feed: '.$e->getMessage());

            return ['error' => 'Unable to fetch Neo Feed. Please try again later.'];
        }
    }

    public function getTechTransferPatents(): array
    {
        $url = 'https://api.nasa.gov/techtransfer/patent/?api_key='.$this->apiKey;
        try {
            $response = $this->client->get($url);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            Log::error('Error fetching Tech Transfer Patents: '.$e->getMessage());

            return ['error' => 'Unable to fetch Tech Transfer Patents. Please try again later.'];
        }
    }

    public function getLibraryAssets(): array
    {
        $url = 'https://images-api.nasa.gov/search?q=moon';
        try {
            $response = $this->client->get($url);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            Log::error('Error fetching Library Assets: '.$e->getMessage());

            return ['error' => 'Unable to fetch Library Assets. Please try again later.'];
        }
    }

    public function getSoundsLibrary(): array
    {
        $url = 'https://api.nasa.gov/planetary/sounds?api_key='.$this->apiKey;
        try {
            $response = $this->client->get($url);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            Log::error('Error fetching Sounds Library: '.$e->getMessage());

            return ['error' => 'Unable to fetch Sounds Library. Please try again later.'];
        }
    }

    public function getSatelliteImagery(): array
    {
        $url = 'https://api.nasa.gov/planetary/earth/imagery?lon=-95.33&lat=29.78&date=2018-01-01&dim=0.10&api_key='.$this->apiKey;
        try {
            $response = $this->client->get($url);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            Log::error('Error fetching Satellite Imagery: '.$e->getMessage());

            return ['error' => 'Unable to fetch Satellite Imagery. Please try again later.'];
        }
    }

    public function getTechPortProjects(): array
    {
        $url = 'https://techport.nasa.gov/api/projects?api_key='.$this->apiKey;
        try {
            $response = $this->client->get($url);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            Log::error('Error fetching TechPort Projects: '.$e->getMessage());

            return ['error' => 'Unable to fetch TechPort Projects. Please try again later.'];
        }
    }

    public function getSpinoff(): array
    {
        $url = 'https://api.nasa.gov/techtransfer/spinoff?api_key='.$this->apiKey;
        try {
            $response = $this->client->get($url);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            Log::error('Error fetching Spinoff: '.$e->getMessage());

            return ['error' => 'Unable to fetch Spinoff. Please try again later.'];
        }
    }
}
