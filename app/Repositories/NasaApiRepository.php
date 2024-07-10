<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Clients\NasaApiClient;
use App\Interfaces\NasaApiRepositoryInterface;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class NasaApiRepository implements NasaApiRepositoryInterface
{
    private NasaApiClient $client;

    public function __construct(NasaApiClient $client)
    {
        $this->client = $client;
    }

    public function getPictureOfTheDay(): array
    {
        try {
            $data = $this->client->getPictureOfTheDay();
            Log::info('Fetched NASA Picture of the Day', ['timestamp' => now()]);
            return $data;
        } catch (RequestException $e) {
            Log::error('Error fetching Picture of the Day', ['error' => $e->getMessage(), 'timestamp' => now()]);
            return [];
        }
    }

    public function getMarsRoverPhotos(): array
    {
        try {
            $data = $this->client->getMarsRoverPhotos();
            Log::info('Fetched Mars Rover Photos', ['timestamp' => now()]);
            return $data;
        } catch (RequestException $e) {
            Log::error('Error fetching Mars Rover Photos', ['error' => $e->getMessage(), 'timestamp' => now()]);
            return [];
        }
    }

    public function getEarthImagery(float $lat, float $lon, string $date): array
    {
        try {
            $data = $this->client->getEarthImagery($lat, $lon, $date);
            Log::info('Fetched Earth Imagery', ['lat' => $lat, 'lon' => $lon, 'date' => $date, 'timestamp' => now()]);
            return $data;
        } catch (RequestException $e) {
            Log::error('Error fetching Earth Imagery', ['error' => $e->getMessage(), 'timestamp' => now()]);
            return [];
        }
    }

    public function getAsteroids(): array
    {
        try {
            $data = $this->client->getAsteroids();
            Log::info('Fetched Asteroids', ['timestamp' => now()]);
            return $data;
        } catch (RequestException $e) {
            Log::error('Error fetching Asteroids', ['error' => $e->getMessage(), 'timestamp' => now()]);
            return [];
        }
    }

    public function getEPIC(): array
    {
        try {
            $data = $this->client->getEPIC();
            Log::info('Fetched EPIC', ['timestamp' => now()]);
            return $data;
        } catch (RequestException $e) {
            Log::error('Error fetching EPIC', ['error' => $e->getMessage(), 'timestamp' => now()]);
            return [];
        }
    }

    public function getMarsWeather(): array
    {
        try {
            $data = $this->client->getMarsWeather();
            Log::info('Fetched Mars Weather', ['timestamp' => now()]);
            return $data;
        } catch (RequestException $e) {
            Log::error('Error fetching Mars Weather', ['error' => $e->getMessage(), 'timestamp' => now()]);
            return [];
        }
    }

    public function getNeoFeed(): array
    {
        try {
            $data = $this->client->getNeoFeed();
            Log::info('Fetched NEO Feed', ['timestamp' => now()]);
            return $data;
        } catch (RequestException $e) {
            Log::error('Error fetching NEO Feed', ['error' => $e->getMessage(), 'timestamp' => now()]);
            return [];
        }
    }

    public function getTechTransferPatents(): array
    {
        try {
            $data = $this->client->getTechTransferPatents();
            Log::info('Fetched Tech Transfer Patents', ['timestamp' => now()]);
            return $data;
        } catch (RequestException $e) {
            Log::error('Error fetching Tech Transfer Patents', ['error' => $e->getMessage(), 'timestamp' => now()]);
            return [];
        }
    }

    public function getLibraryAssets(): array
    {
        try {
            $data = $this->client->getLibraryAssets();
            Log::info('Fetched Library Assets', ['timestamp' => now()]);
            return $data;
        } catch (RequestException $e) {
            Log::error('Error fetching Library Assets', ['error' => $e->getMessage(), 'timestamp' => now()]);
            return [];
        }
    }

    public function getSoundsLibrary(): array
    {
        try {
            $data = $this->client->getSoundsLibrary();
            Log::info('Fetched Sounds Library', ['timestamp' => now()]);
            return $data;
        } catch (RequestException $e) {
            Log::error('Error fetching Sounds Library', ['error' => $e->getMessage(), 'timestamp' => now()]);
            return [];
        }
    }

    public function getSatelliteImagery(): array
    {
        try {
            $data = $this->client->getSatelliteImagery();
            Log::info('Fetched Satellite Imagery', ['timestamp' => now()]);
            return $data;
        } catch (RequestException $e) {
            Log::error('Error fetching Satellite Imagery', ['error' => $e->getMessage(), 'timestamp' => now()]);
            return [];
        }
    }

    public function getTechPortProjects(): array
    {
        try {
            $data = $this->client->getTechPortProjects();
            Log::info('Fetched TechPort Projects', ['timestamp' => now()]);
            return $data;
        } catch (RequestException $e) {
            Log::error('Error fetching TechPort Projects', ['error' => $e->getMessage(), 'timestamp' => now()]);
            return [];
        }
    }

    public function getSpinoff(): array
    {
        try {
            $data = $this->client->getSpinoff();
            Log::info('Fetched Spinoff', ['timestamp' => now()]);
            return $data;
        } catch (RequestException $e) {
            Log::error('Error fetching Spinoff', ['error' => $e->getMessage(), 'timestamp' => now()]);
            return [];
        }
    }
}
