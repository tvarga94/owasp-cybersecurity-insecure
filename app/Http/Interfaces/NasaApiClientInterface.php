<?php

namespace App\Http\Interfaces;

interface NasaApiClientInterface
{
    public function getPictureOfTheDay(): array;
    public function getMarsRoverPhotos(): array;
    public function getEarthImagery(float $lat, float $lon, string $date): array;
    public function getAsteroids(): array;
    public function getEPIC(): array;
}
