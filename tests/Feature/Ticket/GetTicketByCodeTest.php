<?php

namespace Tests\Feature;

use App\Models\Ticket;
use App\Models\PrizeDraw;;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Testing\Fluent\AssertableJson;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class GetTicketByCodeTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var Ticket
     */
    private Ticket $ticket;

    private string $code;

    const GET_TICKET_ROUTE = 'api/ticket';
    const CREATE_TICKET_ROUTE = 'api/create-ticket';


    /**
     * Create basic requests for the tests.
     *
     * @return void
     */
    private function createTicketForTest()
    {
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

        $this->code = $response->json()['ticketCode'];

    }

    /**
     * Tests if the received json structure is as expected, status code is 400
     * and if the exists validation works correctly.
     *
     * @return void
     */
    public function testIfExistsValidationWorks()
    {

        $url = self::GET_TICKET_ROUTE . '/-1';

        $response = $this->get($url);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $this->assertContains(
            'The selected code is invalid.',
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
        self::createTicketForTest();

        $url = self::GET_TICKET_ROUTE . '/' . $this->code;
        $response = $this->get($url);
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonStructure([
            'name',
            'yourNumbers',
            'machineNumbers',
            'winner',
            'message',
        ]);
    }

    /**
     * @return void
     *
     * Tests if the received data types are as expected.
     */
    public function testTypesDataAreAsExpected()
    {
        self::createTicketForTest();


        $url = self::GET_TICKET_ROUTE . '/' . $this->code;
        $response = $this->get($url);
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson(
            fn (AssertableJson $json) => $json->whereAllType(
                [
                    'name' => 'string',
                    'yourNumbers' => 'array',
                    'machineNumbers' => 'array|null',
                    'winner' => 'boolean',
                    'message' => 'string',
                ]
            )
        );
    }
}
