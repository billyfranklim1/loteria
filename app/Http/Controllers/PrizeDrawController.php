<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrizeDraw;
use App\Http\Requests\SavePrizeDrawRequest;
use App\Http\Requests\GetPrizeDrawRequest;
use App\Http\Requests\UpdateStatusPrizeDrawRequest;
use App\Http\Resources\GetPrizeDrawResource;

class PrizeDrawController extends Controller
{

    /**
     *  @OA\Tag(
     *      name="PrizeDraws",
     *      description="PrizeDraws"
     *  ),
     *
     *
     * @OA\Get(path="/api/prize-draw",
     *      tags={"PrizeDraws"},
     *      operationId="getPrizeDraws",
     *      description="List all prize-draw with pagination",
     *      security={{"bearerAuth":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="PrizeDraw not found"
     *       ),
     *      @OA\Response(
     *          response=500,
     *          description="Server error"
     *       )
     *  )
     */



    public function index()
    {
        try {
            return GetPrizeDrawResource::collection(PrizeDraw::paginate(10));

        } catch (\Throwable $th) {
            return [
                'status' => 'error',
                'message' => 'Error getting prize-draw.'
            ];
        }
    }

    public function create()
    {
        return view('prize-draw.create');
    }


     /**
     *  @OA\Tag(
     *      name="PrizeDraws",
     *      description="PrizeDraws"
     *  ),
     *
     *
     * @OA\Post(path="/api/prize-draw",
     *      tags={"PrizeDraws"},
     *      summary="Create a drawing",
     *      description="Create a drawing",
     *      operationId="prize-draw",
     *      description="Create a drawing",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SavePrizeDrawRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Returns the message of the drawing created."
     *      ),
     *      @OA\Response(
     *          response="402",
     *          description="Error validating sent data."
     *      ),
     * )
     */


    public function store(SavePrizeDrawRequest $request)
    {
        try {
            PrizeDraw::create($request->all());
            return [
                'status' => 'success',
                'message' => 'PrizeDraw created successfully.'
            ];
        } catch (\Throwable $th) {
            return [
                'status' => 'error',
                'message' => 'Error creating drawing.',
                'error' => $th->getMessage()
            ];
        }

    }

    /**
     * @OA\Get(
     *      path="/api/prize-draw/{id}",
     *      operationId="getPrizeDrawById",
     *      tags={"PrizeDraws"},
     *      summary="Get especific drawing",
     *      description="Returns drawing data",
     *      @OA\Parameter(
     *          name="id",
     *          description="PrizeDraw id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="PrizeDraw not found"
     *       ),
     *      @OA\Response(
     *          response=500,
     *          description="Server error"
     *       )
     *     )
     */

    public function show(GetPrizeDrawRequest $request)
    {
       try {
            return new GetPrizeDrawResource(PrizeDraw::find($request->id));
        } catch (\Throwable $th) {
            return [
                'status' => 'error',
                'message' => 'Error getting drawing.'
            ];
        }
    }

    public function edit($id)
    {
        return view('prize-draw.edit', compact('drawing'));
    }


    /**
     * @OA\Put(
     *      path="/api/prize-draw/{id}",
     *      operationId="updatePrizeDraw",
     *      tags={"PrizeDraws"},
     *      summary="Update existing drawing",
     *      description="Returns updated drawing data",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="PrizeDraw id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SavePrizeDrawRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="PrizeDraw not found"
     *       ),
     *      @OA\Response(
     *          response=500,
     *          description="Server error"
     *       )
     *     )
     */


    public function update(SavePrizeDrawRequest $request, $id)
    {

        try {

            PrizeDraw::find($id)->update($request->all());
            return [
                'status' => 'success',
                'message' => 'PrizeDraw updated successfully.'
            ];
        } catch (\Throwable $th) {
            return [
                'status' => 'error',
                'message' => 'Error updating drawing.' . $th->getMessage()
            ];
        }

    }



    /**
     * @OA\Delete(
     *      path="/api/prize-draw/{id}",
     *      operationId="deletePrizeDraw",
     *      tags={"PrizeDraws"},
     *      summary="Delete existing drawing",
     *      description="Deletes a record and returns no content",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="PrizeDraw id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="PrizeDraw not found"
     *       ),
     *      @OA\Response(
     *          response=500,
     *          description="Server error"
     *       )
     *     )
     */

    public function destroy($id)
    {
        try {
            PrizeDraw::find($id)->delete();
            return [
                'status' => 'success',
                'message' => 'PrizeDraw deleted successfully.'
            ];
        } catch (\Throwable $th) {
            return [
                'status' => 'error',
                'message' => 'Error deleting drawing.'
            ];
        }

    }


    /**
     * @OA\Put(
     *      path="/api/prize-draw/{id}/update-status",
     *      tags={"PrizeDraws"},
     *      summary="Update status of a drawing",
     *      description="Returns updated drawing data",
     *      operationId="updateStatusPrizeDraw",
     *      @OA\Parameter(
     *          name="id",
     *          description="PrizeDraw id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateStatusPrizeDrawRequest")
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="PrizeDraw not found"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Server error"
     *       )
     *     )
     *
     *
     */

    public function updateStatus(UpdateStatusPrizeDrawRequest $request)
    {
        try {
            PrizeDraw::find($request->id)->update(['status' => $request->status]);
            return [
                'status' => 'success',
                'message' => 'PrizeDraw updated successfully.'
            ];
        } catch (\Throwable $th) {
            return [
                'status' => 'error',
                'message' => 'Error updating drawing.'
            ];
        }
    }

}
