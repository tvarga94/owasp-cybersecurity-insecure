<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Interfaces\NasaApiRepositoryInterface;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Info(
 *     title="NASA API",
 *     version="1.0.0",
 *     description="API documentation for NASA API integration",
 * )
 */
class NasaController extends Controller
{
    private NasaApiRepositoryInterface $nasaApiRepository;

    public function __construct(NasaApiRepositoryInterface $nasaApiRepository)
    {
        $this->nasaApiRepository = $nasaApiRepository;
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
        $data = $this->nasaApiRepository->getPictureOfTheDay();
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
        $data = $this->nasaApiRepository->getMarsRoverPhotos();
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
        $data = $this->nasaApiRepository->getEarthImagery($lat, $lon, $date);
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
        $data = $this->nasaApiRepository->getAsteroids();
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
        $data = $this->nasaApiRepository->getEPIC();
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
        $data = $this->nasaApiRepository->getMarsWeather();
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
        $data = $this->nasaApiRepository->getNeoFeed();
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
        $data = $this->nasaApiRepository->getTechTransferPatents();
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
        $data = $this->nasaApiRepository->getLibraryAssets();
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
        $data = $this->nasaApiRepository->getSoundsLibrary();
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
        $data = $this->nasaApiRepository->getSatelliteImagery();
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
        $data = $this->nasaApiRepository->getTechPortProjects();
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
        $data = $this->nasaApiRepository->getSpinoff();
        return response()->json($data);
    }
}
