<?php

namespace Tests\Feature;

use App\Models\Ticket;
use App\Models\PrizeDraw;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Testing\Fluent\AssertableJson;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class SaveCreateTicketTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var Ticket
     */
    private Ticket $ticket;
    const CREATE_TICKET_ROUTE = 'api/create-ticket';


    private function createFactoryForTest()
    {
        PrizeDraw::factory()->create([
            'status' => PrizeDraw::STATUS_ACTIVE,
        ]);
    }

    /**
     * @return void
     *
     * Tests the validation required  fields works.
     */
    public function testRequiredValidation()
    {

        $url = self::CREATE_TICKET_ROUTE;
        $data = [];

        $response = $this->post($url, $data);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $this->assertContains(
            'The name field is required.',
            $response->json()['message']
        );

        $this->assertContains(
            'The n1 field is required.',
            $response->json()['message']
        );

        $this->assertContains(
            'The n2 field is required.',
            $response->json()['message']
        );


        $this->assertContains(
            'The n3 field is required.',
            $response->json()['message']
        );


        $this->assertContains(
            'The n4 field is required.',
            $response->json()['message']
        );


        $this->assertContains(
            'The n5 field is required.',
            $response->json()['message']
        );

        $this->assertContains(
            'The n6 field is required.',
            $response->json()['message']
        );

    }


    /**
     * @return void
     *
     * Tests the validation n1, n2, n3, n4, n5, n6 between 1 and 60 works.
     */

    public function testValidationBetween1And60()
    {

        $url = self::CREATE_TICKET_ROUTE;
        $data = [
            'name' => 'test',
            'n1' => 0,
            'n2' => 0,
            'n3' => 0,
            'n4' => 0,
            'n5' => 0,
            'n6' => 0,
        ];

        $response = $this->post($url, $data);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $this->assertContains(
            'The n1 must be between 1 and 60.',
            $response->json()['message']
        );

        $this->assertContains(
            'The n2 must be between 1 and 60.',
            $response->json()['message']
        );

        $this->assertContains(
            'The n3 must be between 1 and 60.',
            $response->json()['message']
        );

        $this->assertContains(
            'The n4 must be between 1 and 60.',
            $response->json()['message']
        );

        $this->assertContains(
            'The n5 must be between 1 and 60.',
            $response->json()['message']
        );

        $this->assertContains(
            'The n6 must be between 1 and 60.',
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

        $this->createFactoryForTest();

        $url = self::CREATE_TICKET_ROUTE;
        $data = [
            'name' => 'John Doe',
            'n1' => 1,
            'n2' => 2,
            'n3' => 3,
            'n4' => 4,
            'n5' => 5,
            'n6' => 6,
        ];

        $response = $this->post($url, $data);
        $response->assertStatus(Response::HTTP_CREATED);
    }


}
