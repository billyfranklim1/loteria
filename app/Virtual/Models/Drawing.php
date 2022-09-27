<?php
namespace App\Virtual\Models;


/**
 * @OA\Schema(
 *     title="Drawing",
 *     description="Drawing model",
 *     @OA\Xml(
 *         name="Drawing"
 *     )
 * )
 */
class Drawing
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
     *      title="name",
     *      description="name of the new Ticket",
     *      example="A nice Ticket"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="description",
     *      description="description of the new Ticket",
     *      example="This is new Ticket's description"
     * )
     *
     * @var string
     */
    public $description;


    /**
     * @OA\Property(
     *      title="date_start",
     *      description="status of the new Ticket",
     *      example="This is new Ticket's date_start"
     * )
     *
     * @var date
     */
    public $date_start;


    /**
     * @OA\Property(
     *      title="date_end",
     *      description="status of the new Ticket",
     *      example="This is new Ticket's date_end"
     * )
     *
     * @var date
     */

    public $date_end;

    /**
     * @OA\Property(
     *      title="status",
     *      description="status of the new Ticket",
     *      example="This is new Ticket's status"
     * )
     *
     * @var boolean
     */
    public $status;

    /**
     * @OA\Property(
     *      title="n1",
     *      description="status of the new Ticket",
     *      example="This is new Ticket's n1"
     * )
     *
     * @var integer
     */

    public $n1;

    /**
     * @OA\Property(
     *      title="n2",
     *      description="status of the new Ticket",
     *      example="This is new Ticket's n2"
     * )
     *
     * @var integer
     */

    public $n2;

    /**
     * @OA\Property(
     *      title="n3",
     *      description="status of the new Ticket",
     *      example="This is new Ticket's n3"
     * )
     *
     * @var integer
     */

    public $n3;


    /**
     * @OA\Property(
     *      title="n4",
     *      description="status of the new Ticket",
     *      example="This is new Ticket's n4"
     * )
     *
     * @var integer
     */
    
    public $n4;

    /**
     * @OA\Property(
     *      title="n5",
     *      description="status of the new Ticket",
     *      example="This is new Ticket's n5"
     * )
     *
     * @var integer
     */
    public $n5;


    /**
     * @OA\Property(
     *      title="n6",
     *      description="status of the new Ticket",
     *      example="This is new Ticket's n6"
     * )
     *
     * @var integer
     */
    public $n6;
    


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


}