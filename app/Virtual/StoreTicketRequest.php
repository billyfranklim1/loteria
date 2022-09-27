<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="Store ticket request",
 *      description="Store ticket request body data",
 *      type="object",
 *      required={"name"}
 * )
 */


class StoreTicketRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="name of the new ticket",
     *      example="John Doe"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="n1",
     *      description="n1 of the new ticket",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $n1;

    /**
     * @OA\Property(
     *      title="n2",
     *      description="n2 of the new ticket",
     *      example="2"
     * )
     *
     * @var integer
     */
    public $n2;

    /**
     * @OA\Property(
     *      title="n3",
     *      description="n3 of the new ticket",
     *      example="3"
     * )
     *
     * @var integer
     */
    public $n3;

    /**
     * @OA\Property(
     *      title="n4",
     *      description="n4 of the new ticket",
     *      example="4"
     * )
     *
     * @var integer
     */
    public $n4;

    /**
     * @OA\Property(
     *      title="n5",
     *      description="n5 of the new ticket",
     *      example="5"
     * )
     *
     * @var integer
     */
    public $n5;

    /**
     * @OA\Property(
     *      title="n6",
     *      description="n6 of the new ticket",
     *      example="6"
     * )
     *
     * @var integer
     */
    public $n6;

}
