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
            return $this->client->getPictureOfTheDay();
        } catch (RequestException $e) {
            Log::error('Error fetching Picture of the Day: ' . $e->getMessage());
            return [];
        }
    }

    public function getMarsRoverPhotos(): array
    {
        try {
            return $this->client->getMarsRoverPhotos();
        } catch (RequestException $e) {
            Log::error('Error fetching Mars Rover Photos: ' . $e->getMessage());
            return [];
        }
    }

    public function getEarthImagery(float $lat, float $lon, string $date): array
    {
        try {
            return $this->client->getEarthImagery($lat, $lon, $date);
        } catch (RequestException $e) {
            Log::error('Error fetching Earth Imagery: ' . $e->getMessage());
            return [];
        }
    }

    public function getAsteroids(): array
    {
        try {
            return $this->client->getAsteroids();
        } catch (RequestException $e) {
            Log::error('Error fetching Asteroids: ' . $e->getMessage());
            return [];
        }
    }

    public function getEPIC(): array
    {
        try {
            return $this->client->getEPIC();
        } catch (RequestException $e) {
            Log::error('Error fetching EPIC: ' . $e->getMessage());
            return [];
        }
    }

    public function getMarsWeather(): array
    {
        try {
            return $this->client->getMarsWeather();
        } catch (RequestException $e) {
            Log::error('Error fetching Mars Weather: ' . $e->getMessage());
            return [];
        }
    }

    public function getNeoFeed(): array
    {
        try {
            return $this->client->getNeoFeed();
        } catch (RequestException $e) {
            Log::error('Error fetching NEO Feed: ' . $e->getMessage());
            return [];
        }
    }

    public function getTechTransferPatents(): array
    {
        try {
            return $this->client->getTechTransferPatents();
        } catch (RequestException $e) {
            Log::error('Error fetching Tech Transfer Patents: ' . $e->getMessage());
            return [];
        }
    }

    public function getLibraryAssets(): array
    {
        try {
            return $this->client->getLibraryAssets();
        } catch (RequestException $e) {
            Log::error('Error fetching Library Assets: ' . $e->getMessage());
            return [];
        }
    }

    public function getSoundsLibrary(): array
    {
        try {
            return $this->client->getSoundsLibrary();
        } catch (RequestException $e) {
            Log::error('Error fetching Sounds Library: ' . $e->getMessage());
            return [];
        }
    }

    public function getSatelliteImagery(): array
    {
        try {
            return $this->client->getSatelliteImagery();
        } catch (RequestException $e) {
            Log::error('Error fetching Satellite Imagery: ' . $e->getMessage());
            return [];
        }
    }

    public function getTechPortProjects(): array
    {
        try {
            return $this->client->getTechPortProjects();
        } catch (RequestException $e) {
            Log::error('Error fetching TechPort Projects: ' . $e->getMessage());
            return [];
        }
    }

    public function getSpinoff(): array
    {
        try {
            return $this->client->getSpinoff();
        } catch (RequestException $e) {
            Log::error('Error fetching Spinoff: ' . $e->getMessage());
            return [];
        }
    }
}
