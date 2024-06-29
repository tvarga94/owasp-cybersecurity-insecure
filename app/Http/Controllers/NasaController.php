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

    /**
     * @OA\Get(
     *     path="/api/nasa/earth-imagery",
     *     summary="Get Earth Imagery",
     *     @OA\Parameter(
     *         name="lat",
     *         in="query",
     *         description="Latitude",
     *         required=true,
     *         @OA\Schema(type="number")
     *     ),
     *     @OA\Parameter(
     *         name="lon",
     *         in="query",
     *         description="Longitude",
     *         required=true,
     *         @OA\Schema(type="number")
     *     ),
     *     @OA\Parameter(
     *         name="date",
     *         in="query",
     *         description="Date",
     *         required=true,
     *         @OA\Schema(type="string", format="date")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="url", type="string"),
     *             @OA\Property(property="id", type="string"),
     *         )
     *     ),
     * )
     */
    public function showEarthImagery(float $lat, float $lon, string $date): JsonResponse
    {
        $data = $this->nasaApiClient->getEarthImagery($lat, $lon, $date);
        return response()->json($data);
    }

    /**
     * @OA\Get(
     *     path="/api/nasa/asteroids",
     *     summary="Get Asteroids",
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="near_earth_objects", type="array", @OA\Items(type="object"))
     *         )
     *     ),
     * )
     */
    public function showAsteroids(): JsonResponse
    {
        $data = $this->nasaApiClient->getAsteroids();
        return response()->json($data);
    }

    /**
     * @OA\Get(
     *     path="/api/nasa/epic",
     *     summary="Get EPIC",
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="caption", type="string"),
     *             @OA\Property(property="image", type="string"),
     *             @OA\Property(property="date", type="string")
     *         )
     *     ),
     * )
     */
    public function showEPIC(): JsonResponse
    {
        $data = $this->nasaApiClient->getEPIC();
        return response()->json($data);
    }

    /**
     * @OA\Get(
     *     path="/api/mars-weather",
     *     summary="Get Mars Weather",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent()
     *     )
     * )
     */
    public function getMarsWeather(): JsonResponse
    {
        $data = $this->nasaApiClient->getMarsWeather();
        return response()->json($data);
    }

    /**
     * @OA\Get(
     *     path="/api/neo-feed",
     *     summary="Get NEO Feed",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent()
     *     )
     * )
     */
    public function getNeoFeed(): JsonResponse
    {
        $data = $this->nasaApiClient->getNeoFeed();
        return response()->json($data);
    }

    /**
     * @OA\Get(
     *     path="/api/tech-transfer-patents",
     *     summary="Get Tech Transfer Patents",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent()
     *     )
     * )
     */
    public function getTechTransferPatents(): JsonResponse
    {
        $data = $this->nasaApiClient->getTechTransferPatents();
        return response()->json($data);
    }

    /**
     * @OA\Get(
     *     path="/api/library-assets",
     *     summary="Get Library Assets",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent()
     *     )
     * )
     */
    public function getLibraryAssets(): JsonResponse
    {
        $data = $this->nasaApiClient->getLibraryAssets();
        return response()->json($data);
    }

    /**
     * @OA\Get(
     *     path="/api/sounds-library",
     *     summary="Get Sounds Library",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent()
     *     )
     * )
     */
    public function getSoundsLibrary(): JsonResponse
    {
        $data = $this->nasaApiClient->getSoundsLibrary();
        return response()->json($data);
    }

    /**
     * @OA\Get(
     *     path="/api/satellite-imagery",
     *     summary="Get Satellite Imagery",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent()
     *     )
     * )
     */
    public function getSatelliteImagery(): JsonResponse
    {
        $data = $this->nasaApiClient->getSatelliteImagery();
        return response()->json($data);
    }

    /**
     * @OA\Get(
     *     path="/api/techport-projects",
     *     summary="Get TechPort Projects",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent()
     *     )
     * )
     */
    public function getTechPortProjects(): JsonResponse
    {
        $data = $this->nasaApiClient->getTechPortProjects();
        return response()->json($data);
    }

    /**
     * @OA\Get(
     *     path="/api/spinoff",
     *     summary="Get Spinoff",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent()
     *     )
     * )
     */
    public function getSpinoff(): JsonResponse
    {
        $data = $this->nasaApiClient->getSpinoff();
        return response()->json($data);
    }
}
