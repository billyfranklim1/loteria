<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="Update drawing request",
 *      description="Update drawing request body data",
 *      type="object",
 *      required={"status"}
 * )
 */


class UpdateStatusPrizeDrawRequest
{
    /**
     * @OA\Property(
     *      title="status",
     *      description="status of the drawing",
     *      example="active"
     * )
     *
     * @var string
     */
    public $status;

}
