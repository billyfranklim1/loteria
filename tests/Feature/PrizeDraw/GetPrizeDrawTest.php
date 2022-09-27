<?php

namespace Tests\Feature;

use App\Models\PrizeDraw;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Testing\Fluent\AssertableJson;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class GetPrizeDrawTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var PrizeDraw
     */
    private PrizeDraw $prizeDraw;
    const GET_PRIZE_DRAW_ROUTE = 'api/prize-draw';

    /**
     * Create basic requests for the tests using factories.
     *
     * @return void
     */
    private function createFactoryForTest()
    {
        $this->prizeDraw = PrizeDraw::factory()->create();
    }

    /**
     * Tests if the received json structure is as expected, status code is 400
     * and if the exists validation works correctly.
     *
     * @return void
     */
    public function testIfExistsValidationWorks()
    {

        $url = self::GET_PRIZE_DRAW_ROUTE . '/-1';

        $response = $this->get($url);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $this->assertContains(
            'The selected id is invalid.',
            $response->json()['message']
        );
    }

    /**
     * @return void
     *
     * Tests if the received json structure is as expected.
     */
    public function testJsonStructure()
    {
        self::createFactoryForTest();

        $url = self::GET_PRIZE_DRAW_ROUTE . '/' . $this->prizeDraw->id;
        $response = $this->get($url);
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonStructure([
            'id',
            'name',
            'description',
            'status',
            'machineNumbers'
        ]);
    }

    /**
     * @return void
     *
     * Tests if the received data types are as expected.
     */
    public function testTypesDataAreAsExpected()
    {
        self::createFactoryForTest();


        $url = self::GET_PRIZE_DRAW_ROUTE . '/' . $this->prizeDraw->id;
        $response = $this->get($url);
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson(
            fn (AssertableJson $json) => $json->whereAllType(
                [
                    'id' => 'integer',
                    'name' => 'string',
                    'description' => 'string',
                    'status' => 'string',
                    'machineNumbers' => 'array|null'
                ]
            )
        );
    }
}
