<?php

namespace Tests\Feature;

use App\Models\PrizeDraw;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Testing\Fluent\AssertableJson;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ListPrizeDrawTest extends TestCase
{
    use DatabaseTransactions;


    private $prizeDraw;
    const LIST_PRIZE_DRAW_ROUTE = 'api/prize-draw';

    /**
     * Create basic requests for the tests using factories.
     *
     * @return void
     */
    private function createFactoryForTest()
    {
        $this->prizeDraw = PrizeDraw::factory(10)->create();
    }

    /**
     * @return void
     *
     * Tests if the received json structure is as expected.
     */
    public function testJsonStructure()
    {
        self::createFactoryForTest();

        $url = self::LIST_PRIZE_DRAW_ROUTE;
        $response = $this->get($url);
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'description',
                    'status',
                    'machineNumbers',
                ],
            ],
            'links' => [
                'first',
                'last',
                'prev',
                'next',
            ],
            'meta' => [
                'current_page',
                'from',
                'last_page',
                'links' => [
                    '*' => [
                        'url',
                        'label',
                        'active',
                    ],
                ],
                'path',
                'per_page',
                'to',
                'total',
            ],
        ]);

    }

}
