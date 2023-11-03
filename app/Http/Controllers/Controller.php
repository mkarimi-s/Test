<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function successResponse(AnonymousResourceCollection $result): JsonResponse
    {
        $result = [
            'result' => $result,
            'status' => Response::HTTP_OK,
            'paginate_info' => [
                "page" => $result->resource->currentPage(),
                "per_page" => $result->resource->perPage(),
                "count" => $result->resource->lastPage(),
                "total_count" => $result->resource->total()
            ]
        ];

        return response()->json($result);
    }
}
