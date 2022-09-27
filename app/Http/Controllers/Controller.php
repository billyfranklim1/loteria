<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


/**
 * @OA\Info(
 *      description="Api que simula uma loteria",
 *      version="0.0.4",
 *      title="Loteria",
 * 		@OA\License(
 *            name="Apache 2.0",
 *            url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *        )
 *  ),
 * @OA\Server(
 *        url="http://localhost:8000",
 *        description="Ambiente de desenvolvimento do projeto da loteria localmente"
 *  ),
 *
 * @OA\PathItem(
 *      path="/api/app"
 *  ),
 *
 * @OA\OpenApi(
 *      x={
 *          "tagGroups"={
 *              {"name"="Sorteios", "tags"={"prize-draw"}},
 *              {"name"="Ticket", "tags"={"tickets"}},
 *          }
 *      },
 *  )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
