<?php

namespace Tests\Feature;

use App\Models\PrizeDraw;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Testing\Fluent\AssertableJson;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class DeletePrizeDrawTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var PrizeDraw
     */
    private PrizeDraw $prizeDraw;
    const DELETE_PRIZE_DRAW_ROUTE = 'api/prize-draw';

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

        $url = self::DELETE_PRIZE_DRAW_ROUTE . '/-1';

        $response = $this->delete($url);
        $response->assertStatus(Response::HTTP_NOT_FOUND);

        $this->assertContains(
            'PrizeDraw not found.',
            $response->json()['message']
        );
    }


    /**
     * @return void
     *
     * Tests if delete prize draw works.
     */
    public function testDeletePrizeDraw()
    {
        self::createFactoryForTest();

        $url = self::DELETE_PRIZE_DRAW_ROUTE . '/' . $this->prizeDraw->id;

        $response = $this->delete($url);
        $response->assertStatus(Response::HTTP_OK);

        $this->assertContains(
            'PrizeDraw deleted successfully.',
            $response->json()['message']
        );
    }


}
