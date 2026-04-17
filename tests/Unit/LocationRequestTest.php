<?php
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\LocationRequest;

class LocationRequestTest extends TestCase
{
    public function test_address_is_required()
    {
        $request = new LocationRequest();

        $data = [
            'address' => '',
            'google_map_link' => 'https://maps.google.com/test'
        ];

        $validator = Validator::make($data, $request->rules());
        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('address', $validator->errors()->toArray());
    }

    public function test_google_map_link_must_be_valid_url()
    {
        $request = new LocationRequest();

        $data = [
            'address' => 'Hà Nội',
            'google_map_link' => 'invalid-url'
        ];

        $validator = Validator::make($data, $request->rules());
        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('google_map_link', $validator->errors()->toArray());
    }

    public function test_valid_data_passes_validation()
    {
        $request = new LocationRequest();

        $data = [
            'address' => '123 Trần Hưng Đạo',
            'google_map_link' => 'https://maps.google.com/?q=21.0285,105.8542'
        ];

        $validator = Validator::make($data, $request->rules());
        $this->assertFalse($validator->fails());
    }
}
