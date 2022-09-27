<?php
namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Ticket",
 *     description="Ticket model",
 *     @OA\Xml(
 *         name="Ticket"
 *     )
 * )
 */
class Ticket
{

    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      title="code",
     *      description="code of the new Ticket",
     *      example="1234-5678-9012-3456"
     * )
     *
     * @var string
     */
    public $code;

    /**
     * @OA\Property(
     *      title="status",
     *      description="status of the new Ticket",
     *      example="This is new Ticket's status"
     * )
     *
     * @var string
     */
    public $status;


    /**
     * @OA\Property(
     *      title="prize_draw_id",
     *      description="status of the new Ticket",
     *      example="This is new Ticket's prize_draw_id"
     * )
     *
     * @var string
     */
    public $prize_draw_id;


    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;


    /**
     * @OA\Property(
     *     title="PrizeDraws",
     *     description="Ticket prize-draw's user model"
     * )
     *
     * @var \App\Virtual\Models\PrizeDraw
     */
    private $prizeDraw;
}
