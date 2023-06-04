<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Laravel OpenApi Documentation - Geo PHP Developer Coding Test",
     *      description="L5 Swagger OpenApi description",
     *      @OA\Contact(
     *          email="johnderickdeleone@gmail.com",
     *      ),
     *      @OA\License(
     *          name="N/A"
     *      )
     * )
     *
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="Demo API Server"
     * )

     *
     * @OA\Tag(
     *     name="Geo PHP Developer Coding Test",
     *     description="API Endpoints of the Code Test"
     * )
     */

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
