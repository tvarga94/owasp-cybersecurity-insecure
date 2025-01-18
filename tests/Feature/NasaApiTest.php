<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Interfaces\NasaApiRepositoryInterface;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class NasaApiTest extends TestCase
{
    use WithFaker;

    private MockInterface $mockedRepository;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->mockedRepository = Mockery::mock(NasaApiRepositoryInterface::class);
        $this->app->instance(NasaApiRepositoryInterface::class, $this->mockedRepository);

        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    public function test_it_can_get_epic(): void
    {
        $this->mockedRepository
            ->shouldReceive('getEPIC')
            ->once()
            ->andReturn(['caption' => 'Sample Caption', 'image' => 'http://example.com/epic.jpg', 'date' => '2023-01-01']);

        $response = $this->getJson('/api/nasa/epic');

        $response->assertStatus(200)
            ->assertJson(['caption' => 'Sample Caption', 'image' => 'http://example.com/epic.jpg', 'date' => '2023-01-01']);
    }

    public function test_it_can_get_mars_weather(): void
    {
        $this->mockedRepository
            ->shouldReceive('getMarsWeather')
            ->once()
            ->andReturn(['sol' => 1000, 'temperature' => -60]);

        $response = $this->getJson('/api/mars-weather');

        $response->assertStatus(200)
            ->assertJson(['sol' => 1000, 'temperature' => -60]);
    }

    public function test_it_can_get_neo_feed(): void
    {
        $this->mockedRepository
            ->shouldReceive('getNeoFeed')
            ->once()
            ->andReturn(['near_earth_objects' => [['id' => 1, 'name' => 'Near Earth Object 1']]]);

        $response = $this->getJson('/api/neo-feed');

        $response->assertStatus(200)
            ->assertJson(['near_earth_objects' => [['id' => 1, 'name' => 'Near Earth Object 1']]]);
    }

    public function test_it_can_get_tech_transfer_patents(): void
    {
        $this->mockedRepository
            ->shouldReceive('getTechTransferPatents')
            ->once()
            ->andReturn(['patents' => [['id' => 1, 'title' => 'Patent 1']]]);

        $response = $this->getJson('/api/tech-transfer-patents');

        $response->assertStatus(200)
            ->assertJson(['patents' => [['id' => 1, 'title' => 'Patent 1']]]);
    }

    public function test_it_can_get_library_assets(): void
    {
        $this->mockedRepository
            ->shouldReceive('getLibraryAssets')
            ->once()
            ->andReturn(['collection' => [['id' => 1, 'title' => 'Asset 1']]]);

        $response = $this->getJson('/api/library-assets');

        $response->assertStatus(200)
            ->assertJson(['collection' => [['id' => 1, 'title' => 'Asset 1']]]);
    }

    public function test_it_can_get_sounds_library(): void
    {
        $this->mockedRepository
            ->shouldReceive('getSoundsLibrary')
            ->once()
            ->andReturn(['sounds' => [['id' => 1, 'title' => 'Sound 1']]]);

        $response = $this->getJson('/api/sounds-library');

        $response->assertStatus(200)
            ->assertJson(['sounds' => [['id' => 1, 'title' => 'Sound 1']]]);
    }

    public function test_it_can_get_satellite_imagery(): void
    {
        $this->mockedRepository
            ->shouldReceive('getSatelliteImagery')
            ->once()
            ->andReturn(['satellites' => [['id' => 1, 'name' => 'Satellite 1']]]);

        $response = $this->getJson('/api/satellite-imagery');

        $response->assertStatus(200)
            ->assertJson(['satellites' => [['id' => 1, 'name' => 'Satellite 1']]]);
    }

    public function test_it_can_get_techport_projects(): void
    {
        $this->mockedRepository
            ->shouldReceive('getTechPortProjects')
            ->once()
            ->andReturn(['projects' => [['id' => 1, 'title' => 'Project 1']]]);

        $response = $this->getJson('/api/techport-projects');

        $response->assertStatus(200)
            ->assertJson(['projects' => [['id' => 1, 'title' => 'Project 1']]]);
    }

    public function test_it_can_get_spinoff(): void
    {
        $this->mockedRepository
            ->shouldReceive('getSpinoff')
            ->once()
            ->andReturn(['spinoffs' => [['id' => 1, 'title' => 'Spinoff 1']]]);

        $response = $this->getJson('/api/spinoff');

        $response->assertStatus(200)
            ->assertJson(['spinoffs' => [['id' => 1, 'title' => 'Spinoff 1']]]);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
