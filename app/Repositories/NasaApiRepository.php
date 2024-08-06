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

    private array $allowedDomains = [
        'api.nasa.gov', // Example domain, add your allowed domains here
    ];

    public function __construct(NasaApiClient $client)
    {
        $this->client = $client;
    }

    private function validateUrl(string $url): bool
    {
        $parsedUrl = parse_url($url);
        if ($parsedUrl === false || ! isset($parsedUrl['host'])) {
            return false;
        }

        return in_array($parsedUrl['host'], $this->allowedDomains, true);
    }

    private function sanitizeResponse(array $data): array
    {
        return array_map('htmlspecialchars', $data);
    }

    public function getPictureOfTheDay(): array
    {
        try {
            $url = 'https://api.nasa.gov/planetary/apod'; // Example URL
            if (! $this->validateUrl($url)) {
                throw new \Exception('Invalid URL: '.$url);
            }

            $data = $this->client->getPictureOfTheDay();
            $data = $this->sanitizeResponse($data);
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
            $url = 'https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos'; // Example URL
            if (! $this->validateUrl($url)) {
                throw new \Exception('Invalid URL: '.$url);
            }

            $data = $this->client->getMarsRoverPhotos();
            $data = $this->sanitizeResponse($data);
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
            $url = 'https://api.nasa.gov/planetary/earth/imagery'; // Example URL
            if (! $this->validateUrl($url)) {
                throw new \Exception('Invalid URL: '.$url);
            }

            $data = $this->client->getEarthImagery($lat, $lon, $date);
            $data = $this->sanitizeResponse($data);
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
            $url = 'https://api.nasa.gov/neo/rest/v1/feed'; // Example URL
            if (! $this->validateUrl($url)) {
                throw new \Exception('Invalid URL: '.$url);
            }

            $data = $this->client->getAsteroids();
            $data = $this->sanitizeResponse($data);
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
            $url = 'https://api.nasa.gov/EPIC/api/natural'; // Example URL
            if (! $this->validateUrl($url)) {
                throw new \Exception('Invalid URL: '.$url);
            }

            $data = $this->client->getEPIC();
            $data = $this->sanitizeResponse($data);
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
            $url = 'https://api.nasa.gov/insight_weather/'; // Example URL
            if (! $this->validateUrl($url)) {
                throw new \Exception('Invalid URL: '.$url);
            }

            $data = $this->client->getMarsWeather();
            $data = $this->sanitizeResponse($data);
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
            $url = 'https://api.nasa.gov/neo/rest/v1/feed'; // Example URL
            if (! $this->validateUrl($url)) {
                throw new \Exception('Invalid URL: '.$url);
            }

            $data = $this->client->getNeoFeed();
            $data = $this->sanitizeResponse($data);
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
            $url = 'https://api.nasa.gov/techtransfer/patent/'; // Example URL
            if (! $this->validateUrl($url)) {
                throw new \Exception('Invalid URL: '.$url);
            }

            $data = $this->client->getTechTransferPatents();
            $data = $this->sanitizeResponse($data);
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
            $url = 'https://images-api.nasa.gov'; // Example URL
            if (! $this->validateUrl($url)) {
                throw new \Exception('Invalid URL: '.$url);
            }

            $data = $this->client->getLibraryAssets();
            $data = $this->sanitizeResponse($data);
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
            $url = 'https://api.nasa.gov/planetary/sounds'; // Example URL
            if (! $this->validateUrl($url)) {
                throw new \Exception('Invalid URL: '.$url);
            }

            $data = $this->client->getSoundsLibrary();
            $data = $this->sanitizeResponse($data);
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
            $url = 'https://api.nasa.gov/planetary/earth/assets'; // Example URL
            if (! $this->validateUrl($url)) {
                throw new \Exception('Invalid URL: '.$url);
            }

            $data = $this->client->getSatelliteImagery();
            $data = $this->sanitizeResponse($data);
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
            $url = 'https://api.nasa.gov/techport/'; // Example URL
            if (! $this->validateUrl($url)) {
                throw new \Exception('Invalid URL: '.$url);
            }

            $data = $this->client->getTechPortProjects();
            $data = $this->sanitizeResponse($data);
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
            $url = 'https://api.nasa.gov/spinoff/'; // Example URL
            if (! $this->validateUrl($url)) {
                throw new \Exception('Invalid URL: '.$url);
            }

            $data = $this->client->getSpinoff();
            $data = $this->sanitizeResponse($data);
            Log::info('Fetched Spinoff', ['timestamp' => now()]);

            return $data;
        } catch (RequestException $e) {
            Log::error('Error fetching Spinoff', ['error' => $e->getMessage(), 'timestamp' => now()]);

            return [];
        }
    }
}
