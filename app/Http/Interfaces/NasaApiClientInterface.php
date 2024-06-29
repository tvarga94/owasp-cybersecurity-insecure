<?php

namespace App\Http\Interfaces;

interface NasaApiClientInterface
{
    public function getPictureOfTheDay(): array;
    public function getMarsRoverPhotos();
}
