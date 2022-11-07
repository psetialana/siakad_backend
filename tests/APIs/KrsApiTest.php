<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Krs;

class KrsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_krs()
    {
        $krs = Krs::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/krs', $krs
        );

        $this->assertApiResponse($krs);
    }

    /**
     * @test
     */
    public function test_read_krs()
    {
        $krs = Krs::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/krs/'.$krs->id
        );

        $this->assertApiResponse($krs->toArray());
    }

    /**
     * @test
     */
    public function test_update_krs()
    {
        $krs = Krs::factory()->create();
        $editedKrs = Krs::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/krs/'.$krs->id,
            $editedKrs
        );

        $this->assertApiResponse($editedKrs);
    }

    /**
     * @test
     */
    public function test_delete_krs()
    {
        $krs = Krs::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/krs/'.$krs->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/krs/'.$krs->id
        );

        $this->response->assertStatus(404);
    }
}
