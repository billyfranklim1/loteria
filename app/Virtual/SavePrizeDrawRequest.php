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


class SavePrizeDrawRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="name of the new drawing",
     *      example="PrizeDraw 1"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="description",
     *      description="description of the new drawing",
     *      example="PrizeDraw 1 is the first drawing"
     * )
     *
     * @var string
     */
    public $description;

}
