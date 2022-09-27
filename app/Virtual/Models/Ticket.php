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
     *      example="A nice Ticket"
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
     *      title="drawing_id",
     *      description="status of the new Ticket",
     *      example="This is new Ticket's drawing_id"
     * )
     *
     * @var string
     */
    public $drawing_id;


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
     *     title="Drawings",
     *     description="Ticket drawings's user model"
     * )
     *
     * @var \App\Virtual\Models\Drawing
     */
    private $drawings;
}