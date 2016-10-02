<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param $result
     * @param $dataReturned
     * @param $errorTranslation
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondCondition(bool $result, $dataReturned, string $errorTranslation): \Illuminate\Http\JsonResponse
    {
        if ($result) {
            $output = $this->respondData($dataReturned);
        } else {
            $output = $this->respondError(trans($errorTranslation));
        }

        return $output;
    }

    /**
     * @param null $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondData($data = null)
    {
        return $this->respondJson(1, ['data' => $data]);
    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondError($message)
    {
        return $this->respondJson(0, ['error' => $message]);
    }

    /**
     * Creates a JSON Response
     *
     * @param $status
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondJson($status, array $data)
    {
        $data['status'] = $status;
        return response()->json($data);
    }
}
