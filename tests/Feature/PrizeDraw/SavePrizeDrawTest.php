<?php

namespace Tests\Feature;

use App\Models\PrizeDraw;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Testing\Fluent\AssertableJson;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class SavePrizeDrawTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var PrizeDraw
     */
    private PrizeDraw $prizeDraw;
    const SAVE_PRIZE_DRAW_ROUTE = 'api/prize-draw';


    /**
     * @return void
     *
     * Tests the validation required  fields works.
     */
    public function testRequiredValidation()
    {

        $url = self::SAVE_PRIZE_DRAW_ROUTE;
        $data = [];

        $response = $this->post($url, $data);
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
     * Tests if save prize draw works.
     */
    public function testSuccessSave()
    {
        $url = self::SAVE_PRIZE_DRAW_ROUTE;
        $data = [
            'name' => 'Teste',
            'description' => 'Teste',
        ];

        $response = $this->post($url, $data);
        $response->assertStatus(Response::HTTP_OK);
    }




}
