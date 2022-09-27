<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketNumber;
use App\Models\Drawing;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Resources\CreateTicketResource;
use App\Http\Resources\GetTicketResource;
use App\Http\Requests\GetTicketRequest;

class TicketController extends Controller
{
    /**
     *  @OA\Tag(
     *      name="Tickets",
     *      description="Tickets"
     *  ),
     *
     *
     * @OA\Post(path="/api/create-ticket",
     *      tags={"Tickets"},
     *      operationId="createTicket",
     *      description="Create a ticket",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreTicketRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Returns the message of the ticket created."
     *      ),
     *      @OA\Response(
     *          response="402",
     *          description="Error validating sent data."
     *      ),
     * )
     */
    public function createTicket(StoreTicketRequest $request)
    {
        $drawing = Drawing::where('status', 1)->first();
        if (!$drawing) {
            return response()->json([
                'message' => 'No active drawing',
            ], 403);
        }

        $ticket = Ticket::create([
            'code' => $this->generateTicketCode(),
            'name' => $request->name,
            'status' => 'pending',
            'drawing_id' => $this->getDrawingActive()->id,
            'n1' => $request->n1,
            'n2' => $request->n2,
            'n3' => $request->n3,
            'n4' => $request->n4,
            'n5' => $request->n5,
            'n6' => $request->n6,
        ]);

        return new CreateTicketResource($ticket);


    }


    /**
     *  @OA\Tag(
     *      name="Tickets",
     *      description="Tickets"
     *  ),
     *
     *
     * @OA\Get(path="/api/ticket/{ticketCode}",
     *      tags={"Tickets"},
     *      operationId="getTicket",
     *      description="Download model",
     *      @OA\Parameter(
     *          name="ticketCode",
     *          description="Ticket code",
     *          required=true,
     *          in="path",
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Ticket not found",
     *       ),
     *      @OA\Response(
     *          response=500,
     *          description="Server error"
     *       )
     *  )
     */

    public function getTicket(GetTicketRequest $request, $code)
    {
        $ticket = Ticket::where('code', $code)->first();

        return new GetTicketResource($ticket);
    }


    private function generateTicketCode()
    {
        $code = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyz', ceil(14/strlen($x)) )),1,14);
        $code = substr($code, 0, 4) . '-' . substr($code, 4, 4) . '-' . substr($code, 8, 4);

        $ticket = Ticket::where('code', $code)->first();
        if ($ticket) {
            $code = $this->generateTicketCode();
        }

        return $code;
    }


    private function getDrawingActive()
    {
        $drawing = Drawing::where('status', 1)->first();

        return $drawing;
    }
}
