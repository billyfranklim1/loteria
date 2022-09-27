<?php

namespace Tests\Feature;

use App\Models\PrizeDraw;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Testing\Fluent\AssertableJson;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class UpdatePrizeDrawTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var PrizeDraw
     */
    private PrizeDraw $prizeDraw;
    const UPDATE_PRIZE_DRAW_ROUTE = 'api/prize-draw';

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
     * @return void
     *
     * Tests the validation required  fields works.
     */
    public function testRequiredValidation()
    {

        $this->createFactoryForTest();


        $url = self::UPDATE_PRIZE_DRAW_ROUTE.'/'.$this->prizeDraw->id;
        $data = [];

        $response = $this->put($url, $data);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $this->assertContains(
            'The name field is required.',
            $response->json()['message']
        );

        $this->assertContains(
            'The description field is required.',
            $response->json()['message']
        );
    }

    /**
     * @return void
     *
     * Tests if update prize draw works.
     */
    public function testSuccessUpdate()
    {
        $this->createFactoryForTest();

        $url = self::UPDATE_PRIZE_DRAW_ROUTE . '/' . $this->prizeDraw->id;
        $data = [
            'name' => 'Teste (edited)',
            'description' => 'Teste (edited)',
        ];

        $response = $this->put($url, $data);
        $response->assertStatus(Response::HTTP_OK);
    }





}
