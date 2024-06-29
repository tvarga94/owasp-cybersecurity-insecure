<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\NasaApiClientInterface;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Info(
 *     title="NASA API",
 *     version="1.0.0",
 * )
 */
class NasaController extends Controller
{
    private NasaApiClientInterface $nasaApiClient;

    public function __construct(NasaApiClientInterface $nasaApiClient)
    {
        $this->nasaApiClient = $nasaApiClient;
    }

    /**
     * @OA\Get(
     *     path="/api/nasa/picture-of-the-day",
     *     summary="Get NASA Picture of the Day",
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="url", type="string"),
     *             @OA\Property(property="explanation", type="string"),
     *         )
     *     ),
     * )
     */
    public function showPictureOfTheDay(): JsonResponse
    {
        $data = $this->nasaApiClient->getPictureOfTheDay();
        return response()->json($data);
    }

    /**
     * @OA\Get(
     *     path="/api/nasa/mars-rover-photos",
     *     summary="Get Mars Rover Photos",
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="photos", type="array", @OA\Items(type="object"))
     *         )
     *     ),
     * )
     */
    public function showMarsRoverPhotos(): JsonResponse
    {
        $data = $this->nasaApiClient->getMarsRoverPhotos();
        return response()->json($data);
    }
}
