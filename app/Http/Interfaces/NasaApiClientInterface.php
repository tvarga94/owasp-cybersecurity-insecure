<?php

namespace App\Http\Interfaces;

interface NasaApiClientInterface
{
    public function getPictureOfTheDay(): array;
    public function getMarsRoverPhotos(): array;
    public function getEarthImagery(float $lat, float $lon, string $date): array;
    public function getAsteroids(): array;
    public function getEPIC(): array;
    public function getMarsWeather(): array;
    public function getNeoFeed(): array;
    public function getTechTransferPatents(): array;
    public function getLibraryAssets(): array;
    public function getSoundsLibrary(): array;
    public function getSatelliteImagery(): array;
    public function getTechPortProjects(): array;
    public function getSpinoff(): array;
}
