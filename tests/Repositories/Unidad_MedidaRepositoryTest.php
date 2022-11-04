<?php namespace Tests\Repositories;

use App\Models\Unidad_Medida;
use App\Repositories\Unidad_MedidaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class Unidad_MedidaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var Unidad_MedidaRepository
     */
    protected $unidadMedidaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->unidadMedidaRepo = \App::make(Unidad_MedidaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_unidad__medida()
    {
        $unidadMedida = Unidad_Medida::factory()->make()->toArray();

        $createdUnidad_Medida = $this->unidadMedidaRepo->create($unidadMedida);

        $createdUnidad_Medida = $createdUnidad_Medida->toArray();
        $this->assertArrayHasKey('id', $createdUnidad_Medida);
        $this->assertNotNull($createdUnidad_Medida['id'], 'Created Unidad_Medida must have id specified');
        $this->assertNotNull(Unidad_Medida::find($createdUnidad_Medida['id']), 'Unidad_Medida with given id must be in DB');
        $this->assertModelData($unidadMedida, $createdUnidad_Medida);
    }

    /**
     * @test read
     */
    public function test_read_unidad__medida()
    {
        $unidadMedida = Unidad_Medida::factory()->create();

        $dbUnidad_Medida = $this->unidadMedidaRepo->find($unidadMedida->id);

        $dbUnidad_Medida = $dbUnidad_Medida->toArray();
        $this->assertModelData($unidadMedida->toArray(), $dbUnidad_Medida);
    }

    /**
     * @test update
     */
    public function test_update_unidad__medida()
    {
        $unidadMedida = Unidad_Medida::factory()->create();
        $fakeUnidad_Medida = Unidad_Medida::factory()->make()->toArray();

        $updatedUnidad_Medida = $this->unidadMedidaRepo->update($fakeUnidad_Medida, $unidadMedida->id);

        $this->assertModelData($fakeUnidad_Medida, $updatedUnidad_Medida->toArray());
        $dbUnidad_Medida = $this->unidadMedidaRepo->find($unidadMedida->id);
        $this->assertModelData($fakeUnidad_Medida, $dbUnidad_Medida->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_unidad__medida()
    {
        $unidadMedida = Unidad_Medida::factory()->create();

        $resp = $this->unidadMedidaRepo->delete($unidadMedida->id);

        $this->assertTrue($resp);
        $this->assertNull(Unidad_Medida::find($unidadMedida->id), 'Unidad_Medida should not exist in DB');
    }
}
