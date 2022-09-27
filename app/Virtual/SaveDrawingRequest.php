<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="Store drawing request",
 *      description="Store drawing request body data",
 *      type="object",
 *      required={"name"}
 * )
 */


class SaveDrawingRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="name of the new drawing",
     *      example="Drawing 1"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="description",
     *      description="description of the new drawing",
     *      example="Drawing 1 is the first drawing"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="date_start",
     *      description="date_start of the new drawing",
     *      example="2021-01-01"
     * )
     *
     * @var string
     */

    public $date_start;

    /**
     * @OA\Property(
     *      title="date_end",
     *      description="date_end of the new drawing",
     *      example="2021-01-01"
     * )
     *
     * @var string
     */

    public $date_end;

}
