<?php

namespace App\Http\Controllers;

use App\UserMark;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class UserMarkController extends Controller
{
    public function index(UserMark $mark): JsonResponse
    {

    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(), [
            'user_id' => 'required|integer',
            'assignment' => 'string|max:255',
            'percentage' => 'integer|max:3',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $mark = new UserMark($request->all());

        $result = $mark->save();

        return $this->respondCondition($result, $mark->id, 'user_mark.store_failed');
    }

    public function show(UserMark $mark): JsonResponse
    {
        $marks = $mark::where('user_id', '=', $mark->id)->get();

        return $this->respondData($marks);
    }

    public function update(Request $request, int $markId): JsonResponse
    {
        $validator = Validator::make(
            $request->all(), [
            'user_id' => 'required|integer',
            'assignment' => 'string|max:255',
            'percentage' => 'integer|max:3',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $mark = new UserMark($request->all());

        $result = $mark->save();

        return $this->respondCondition($result, $markId, 'user_mark.update_failed');
    }

    public function destroy(UserMark $mark): JsonResponse
    {
        $result = $mark->delete();

        return $this->respondCondition($result, $mark->id, 'user_mark.destroy_failed');
    }

    public function search(Request $request, $searchString): JsonResponse
    {
        $marks = UserMark::where('assignment', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($marks);
    }
}