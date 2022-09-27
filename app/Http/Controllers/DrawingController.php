<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drawing;
use App\Http\Requests\SaveDrawingRequest;
use App\Http\Requests\GetDrawingRequest;

class DrawingController extends Controller
{

    /**
     *  @OA\Tag(
     *      name="Drawings",
     *      description="Drawings"
     *  ),
     *
     *
     * @OA\Get(path="/api/drawings",
     *      tags={"Drawings"},
     *      operationId="getDrawings",
     *      description="List all drawings with pagination",
     *      security={{"bearerAuth":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Drawing not found"
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
            return Drawing::paginate(10);

        } catch (\Throwable $th) {
            return [
                'status' => 'error',
                'message' => 'Error getting drawings.'
            ];
        }
    }

    public function create()
    {
        return view('drawings.create');
    }


     /**
     *  @OA\Tag(
     *      name="Drawings",
     *      description="Drawings"
     *  ),
     *
     *
     * @OA\Post(path="/api/drawings",
     *      tags={"Drawings"},
     *      summary="Create a drawing",
     *      description="Create a drawing",
     *      operationId="drawings",
     *      description="Create a drawing",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SaveDrawingRequest")
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


    public function store(SaveDrawingRequest $request)
    {
        try {
            Drawing::create($request->all());
            return [
                'status' => 'success',
                'message' => 'Drawing created successfully.'
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
     *      path="/api/drawings/{id}",
     *      operationId="getDrawingById",
     *      tags={"Drawings"},
     *      summary="Get especific drawing",
     *      description="Returns drawing data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Drawing id",
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
     *          description="Drawing not found"
     *       ),
     *      @OA\Response(
     *          response=500,
     *          description="Server error"
     *       )
     *     )
     */

    public function show(GetDrawingRequest $request)
    {
       try {
            return Drawing::find($request->id);
        } catch (\Throwable $th) {
            return [
                'status' => 'error',
                'message' => 'Error getting drawing.'
            ];
        }
    }

    public function edit($id)
    {
        return view('drawings.edit', compact('drawing'));
    }


    /**
     * @OA\Put(
     *      path="/api/drawings/{id}",
     *      operationId="updateDrawing",
     *      tags={"Drawings"},
     *      summary="Update existing drawing",
     *      description="Returns updated drawing data",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="Drawing id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SaveDrawingRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Drawing not found"
     *       ),
     *      @OA\Response(
     *          response=500,
     *          description="Server error"
     *       )
     *     )
     */


    public function update(SaveDrawingRequest $request, $id)
    {

        try {

            Drawing::find($id)->update($request->all());
            return [
                'status' => 'success',
                'message' => 'Drawing updated successfully.'
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
     *      path="/api/drawings/{id}",
     *      operationId="deleteDrawing",
     *      tags={"Drawings"},
     *      summary="Delete existing drawing",
     *      description="Deletes a record and returns no content",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="Drawing id",
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
     *          description="Drawing not found"
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
            $drawing->delete();
            return [
                'status' => 'success',
                'message' => 'Drawing deleted successfully.'
            ];
        } catch (\Throwable $th) {
            return [
                'status' => 'error',
                'message' => 'Error deleting drawing.'
            ];
        }

    }

}
