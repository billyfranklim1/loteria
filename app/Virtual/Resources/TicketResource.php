<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="TicketResource",
 *     description="Project resource",
 *     @OA\Xml(
 *         name="TicketResource"
 *     )
 * )
 */
class TicketResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Ticket[]
     */
    private $data;
}