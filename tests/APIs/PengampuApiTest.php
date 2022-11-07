<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Pengampu;

class PengampuApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pengampu()
    {
        $pengampu = Pengampu::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pengampus', $pengampu
        );

        $this->assertApiResponse($pengampu);
    }

    /**
     * @test
     */
    public function test_read_pengampu()
    {
        $pengampu = Pengampu::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/pengampus/'.$pengampu->id
        );

        $this->assertApiResponse($pengampu->toArray());
    }

    /**
     * @test
     */
    public function test_update_pengampu()
    {
        $pengampu = Pengampu::factory()->create();
        $editedPengampu = Pengampu::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pengampus/'.$pengampu->id,
            $editedPengampu
        );

        $this->assertApiResponse($editedPengampu);
    }

    /**
     * @test
     */
    public function test_delete_pengampu()
    {
        $pengampu = Pengampu::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pengampus/'.$pengampu->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pengampus/'.$pengampu->id
        );

        $this->response->assertStatus(404);
    }
}
