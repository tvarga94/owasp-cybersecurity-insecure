<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Clients\NasaApiClient;
use App\Interfaces\NasaApiRepositoryInterface;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;

class NasaApiRepository implements NasaApiRepositoryInterface
{
    private NasaApiClient $client;

    private array $allowedDomains = [
        'api.nasa.gov',
    ];

    public function __construct(NasaApiClient $client)
    {
        $this->client = $client;
    }

    private function validateUrl(string $url): bool
    {
        $parsedUrl = parse_url($url);
        if ($parsedUrl === false || !isset($parsedUrl['host'])) {
            return false;
        }

        return in_array($parsedUrl['host'], $this->allowedDomains, true);
    }

    private function sanitizeResponse(array $data): array
    {
        return array_map('htmlspecialchars', $data);
    }

    private function isRateLimited(string $key): bool
    {
        return !RateLimiter::attempt($key, 10, function () {
        });
    }

    public function getPictureOfTheDay(): array
    {
        $rateLimitKey = 'nasa:getPictureOfTheDay';
        if ($this->isRateLimited($rateLimitKey)) {
            return ['error' => 'Rate limit exceeded. Please try again later.'];
        }

        try {
            $url = 'https://api.nasa.gov/planetary/apod';
            if (!$this->validateUrl($url)) {
                throw new \Exception('Invalid URL: ' . $url);
            }

            $data = $this->client->getPictureOfTheDay();
            $data = $this->sanitizeResponse($data);

            return $data;
        } catch (RequestException $e) {
            return [];
        }
    }

    public function getMarsRoverPhotos(): array
    {
        $rateLimitKey = 'nasa:getMarsRoverPhotos';
        if ($this->isRateLimited($rateLimitKey)) {
            return ['error' => 'Rate limit exceeded. Please try again later.'];
        }

        try {
            $url = 'https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos';
            if (!$this->validateUrl($url)) {
                throw new \Exception('Invalid URL: ' . $url);
            }

            $data = $this->client->getMarsRoverPhotos();
            $data = $this->sanitizeResponse($data);

            return $data;
        } catch (RequestException $e) {
            return [];
        }
    }

    public function getEarthImagery(float $lat, float $lon, string $date): array
    {
        $rateLimitKey = 'nasa:getEarthImagery';
        if ($this->isRateLimited($rateLimitKey)) {
            return ['error' => 'Rate limit exceeded. Please try again later.'];
        }

        try {
            $url = 'https://api.nasa.gov/planetary/earth/imagery';
            if (!$this->validateUrl($url)) {
                throw new \Exception('Invalid URL: ' . $url);
            }

            $data = $this->client->getEarthImagery($lat, $lon, $date);
            $data = $this->sanitizeResponse($data);

            return $data;
        } catch (RequestException $e) {
            return [];
        }
    }

    public function getAsteroids(): array
    {
        $rateLimitKey = 'nasa:getAsteroids';
        if ($this->isRateLimited($rateLimitKey)) {
            return ['error' => 'Rate limit exceeded. Please try again later.'];
        }

        try {
            $url = 'https://api.nasa.gov/neo/rest/v1/feed';
            if (!$this->validateUrl($url)) {
                throw new \Exception('Invalid URL: ' . $url);
            }

            $data = $this->client->getAsteroids();
            $data = $this->sanitizeResponse($data);

            return $data;
        } catch (RequestException $e) {
            return [];
        }
    }

    public function getEPIC(): array
    {
        $rateLimitKey = 'nasa:getEPIC';
        if ($this->isRateLimited($rateLimitKey)) {
            return ['error' => 'Rate limit exceeded. Please try again later.'];
        }

        try {
            $url = 'https://api.nasa.gov/EPIC/api/natural';
            if (!$this->validateUrl($url)) {
                throw new \Exception('Invalid URL: ' . $url);
            }

            $data = $this->client->getEPIC();
            $data = $this->sanitizeResponse($data);

            return $data;
        } catch (RequestException $e) {
            return [];
        }
    }

    public function getMarsWeather(): array
    {
        $rateLimitKey = 'nasa:getMarsWeather';
        if ($this->isRateLimited($rateLimitKey)) {
            return ['error' => 'Rate limit exceeded. Please try again later.'];
        }

        try {
            $url = 'https://api.nasa.gov/insight_weather/';
            if (!$this->validateUrl($url)) {
                throw new \Exception('Invalid URL: ' . $url);
            }

            $data = $this->client->getMarsWeather();
            $data = $this->sanitizeResponse($data);

            return $data;
        } catch (RequestException $e) {
            return [];
        }
    }

    public function getNeoFeed(): array
    {
        $rateLimitKey = 'nasa:getNeoFeed';
        if ($this->isRateLimited($rateLimitKey)) {
            return ['error' => 'Rate limit exceeded. Please try again later.'];
        }

        try {
            $url = 'https://api.nasa.gov/neo/rest/v1/feed';
            if (!$this->validateUrl($url)) {
                throw new \Exception('Invalid URL: ' . $url);
            }

            $data = $this->client->getNeoFeed();
            $data = $this->sanitizeResponse($data);

            return $data;
        } catch (RequestException $e) {
            return [];
        }
    }

    public function getTechTransferPatents(): array
    {
        $rateLimitKey = 'nasa:getTechTransferPatents';
        if ($this->isRateLimited($rateLimitKey)) {
            return ['error' => 'Rate limit exceeded. Please try again later.'];
        }

        try {
            $url = 'https://api.nasa.gov/techtransfer/patent/';
            if (!$this->validateUrl($url)) {
                throw new \Exception('Invalid URL: ' . $url);
            }

            $data = $this->client->getTechTransferPatents();
            $data = $this->sanitizeResponse($data);

            return $data;
        } catch (RequestException $e) {
            return [];
        }
    }

    public function getLibraryAssets(): array
    {
        $rateLimitKey = 'nasa:getLibraryAssets';
        if ($this->isRateLimited($rateLimitKey)) {
            return ['error' => 'Rate limit exceeded. Please try again later.'];
        }

        try {
            $url = 'https://images-api.nasa.gov';
            if (!$this->validateUrl($url)) {
                throw new \Exception('Invalid URL: ' . $url);
            }

            $data = $this->client->getLibraryAssets();
            $data = $this->sanitizeResponse($data);

            return $data;
        } catch (RequestException $e) {
            return [];
        }
    }

    public function getSoundsLibrary(): array
    {
        $rateLimitKey = 'nasa:getSoundsLibrary';
        if ($this->isRateLimited($rateLimitKey)) {
            return ['error' => 'Rate limit exceeded. Please try again later.'];
        }

        try {
            $url = 'https://api.nasa.gov/planetary/sounds';
            if (!$this->validateUrl($url)) {
                throw new \Exception('Invalid URL: ' . $url);
            }

            $data = $this->client->getSoundsLibrary();
            $data = $this->sanitizeResponse($data);

            return $data;
        } catch (RequestException $e) {
            return [];
        }
    }

    public function getSatelliteImagery(): array
    {
        $rateLimitKey = 'nasa:getSatelliteImagery';
        if ($this->isRateLimited($rateLimitKey)) {
            return ['error' => 'Rate limit exceeded. Please try again later.'];
        }

        try {
            $url = 'https://api.nasa.gov/planetary/earth/assets';
            if (!$this->validateUrl($url)) {
                throw new \Exception('Invalid URL: ' . $url);
            }

            $data = $this->client->getSatelliteImagery();
            $data = $this->sanitizeResponse($data);

            return $data;
        } catch (RequestException $e) {
            return [];
        }
    }

    public function getTechPortProjects(): array
    {
        $rateLimitKey = 'nasa:getTechPortProjects';
        if ($this->isRateLimited($rateLimitKey)) {
            return ['error' => 'Rate limit exceeded. Please try again later.'];
        }

        try {
            $url = 'https://api.nasa.gov/techport/';
            if (!$this->validateUrl($url)) {
                throw new \Exception('Invalid URL: ' . $url);
            }

            $data = $this->client->getTechPortProjects();
            $data = $this->sanitizeResponse($data);

            return $data;
        } catch (RequestException $e) {
            return [];
        }
    }

    public function getSpinoff(): array
    {
        $rateLimitKey = 'nasa:getSpinoff';
        if ($this->isRateLimited($rateLimitKey)) {
            return ['error' => 'Rate limit exceeded. Please try again later.'];
        }

        try {
            $url = 'https://api.nasa.gov/spinoff/';
            if (!$this->validateUrl($url)) {
                throw new \Exception('Invalid URL: ' . $url);
            }

            $data = $this->client->getSpinoff();
            $data = $this->sanitizeResponse($data);

            return $data;
        } catch (RequestException $e) {
            return [];
        }
    }
}
