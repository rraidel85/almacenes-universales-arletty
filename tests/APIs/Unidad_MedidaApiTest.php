<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Unidad_Medida;

class Unidad_MedidaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_unidad__medida()
    {
        $unidadMedida = Unidad_Medida::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/unidad__medidas', $unidadMedida
        );

        $this->assertApiResponse($unidadMedida);
    }

    /**
     * @test
     */
    public function test_read_unidad__medida()
    {
        $unidadMedida = Unidad_Medida::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/unidad__medidas/'.$unidadMedida->id
        );

        $this->assertApiResponse($unidadMedida->toArray());
    }

    /**
     * @test
     */
    public function test_update_unidad__medida()
    {
        $unidadMedida = Unidad_Medida::factory()->create();
        $editedUnidad_Medida = Unidad_Medida::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/unidad__medidas/'.$unidadMedida->id,
            $editedUnidad_Medida
        );

        $this->assertApiResponse($editedUnidad_Medida);
    }

    /**
     * @test
     */
    public function test_delete_unidad__medida()
    {
        $unidadMedida = Unidad_Medida::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/unidad__medidas/'.$unidadMedida->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/unidad__medidas/'.$unidadMedida->id
        );

        $this->response->assertStatus(404);
    }
}
