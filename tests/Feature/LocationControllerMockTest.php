<?php
namespace Tests\Feature;

use Tests\TestCase;
use Mockery;
use App\Models\Location;

class LocationControllerMockTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_store_calls_create_and_redirects()
    {
        // payload hợp lệ
        $payload = [
            'address' => '123 Trần Hưng Đạo',
            'google_map_link' => 'https://maps.google.com/?q=21.0285,105.8542'
        ];

        // mock static call Location::create(...)
        $mock = Mockery::mock('alias:App\Models\Location');
        $mock->shouldReceive('create')
             ->once()
             ->with(Mockery::on(function($data) use ($payload) {
                 // kiểm tra ít nhất 2 trường cần thiết
                 return isset($data['address']) && $data['address'] === $payload['address']
                     && isset($data['google_map_link']) && filter_var($data['google_map_link'], FILTER_VALIDATE_URL);
             }))
             ->andReturn(new Location(['id' => 1])); // trả về object giả (không gọi DB)

        $response = $this->post(route('locations.store'), $payload);
        $response->assertRedirect(route('locations.index'));
    }

    public function test_update_calls_find_and_update_and_redirects()
    {
        $id = 5;
        $payload = [
            'address' => '456 Lê Lợi',
            'google_map_link' => 'https://maps.google.com/?q=16.0544,108.2022'
        ];

        // mock Location::findOrFail($id) để trả về instance có method update()
        $modelInstance = Mockery::mock();
        $modelInstance->shouldReceive('update')
                      ->once()
                      ->with(Mockery::on(function($data) use ($payload) {
                          return isset($data['address']) && $data['address'] === $payload['address'];
                      }))
                      ->andReturnTrue();

        $mock = Mockery::mock('alias:App\Models\Location');
        $mock->shouldReceive('findOrFail')
             ->once()
             ->with($id)
             ->andReturn($modelInstance);

        $response = $this->put(route('locations.update', $id), $payload);
        $response->assertRedirect(route('locations.index'));
    }

    public function test_delete_calls_find_and_delete_and_redirects()
    {
        $id = 7;

        $modelInstance = Mockery::mock();
        $modelInstance->shouldReceive('delete')
                      ->once()
                      ->andReturnTrue();

        $mock = Mockery::mock('alias:App\Models\Location');
        $mock->shouldReceive('findOrFail')
             ->once()
             ->with($id)
             ->andReturn($modelInstance);

        $response = $this->delete(route('locations.destroy', $id));
        $response->assertRedirect(route('locations.index'));
    }
}
