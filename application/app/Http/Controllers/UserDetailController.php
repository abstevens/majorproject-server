<?php

namespace App\Http\Controllers;

use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class UserDetailController extends Controller
{
    public function index(UserDetail $detail): JsonResponse
    {
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
            'user_id' => 'required|integer',
            'type' => 'string|max:255',
            'value' => 'string|max:255',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $detail = new UserDetail($request->all());

        $result = $detail->save();

        return $this->respondCondition($result, $detail->id, 'user_detail.store_failed');
    }

    public function show(UserDetail $detail): JsonResponse
    {
        $details = $detail::where('user_id', '=', $detail->id)->get();

        return $this->respondData($details);
    }

    public function update(Request $request, int $detailId): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
            'user_id' => 'required|integer',
            'type' => 'string|max:255',
            'value' => 'string|max:255',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $detail = new UserDetail($request->all());

        $result = $detail->save();

        return $this->respondCondition($result, $detailId, 'user_detail.update_failed');
    }

    public function destroy(UserDetail $detail): JsonResponse
    {
        $result = $detail->delete();

        return $this->respondCondition($result, $detail->id, 'user_detail.destroy_failed');
    }

    public function search(Request $request, $searchString): JsonResponse
    {
        $details = UserDetail::where('type', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($details);
    }
}
