<?php

namespace App\Http\Controllers;

use App\CourseAward;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseAwardController extends Controller
{
    public function index(CourseAward $award): JsonResponse
    {
        $awards = $award::all();

        return $this->respondData($awards);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(), [
            'course_id' => 'required|integer',
            'name' => 'required|string|max:255',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $award = new CourseAward($request->all());

        $result = $award->save();

        return $this->respondCondition($result, $award->id, 'course_award.store_failed');
    }

    public function show(CourseAward $award): JsonResponse
    {
        return $this->respondData($award);
    }

    public function update(Request $request, int $awardId): JsonResponse
    {
        $validator = Validator::make(
            $request->all(), [
            'course_id' => 'required|integer',
            'name' => 'required|string|max:255',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $award = new CourseAward($request->all());

        $result = $award->save();

        return $this->respondCondition($result, $awardId, 'course_award.update_failed');
    }

    public function destroy(CourseAward $award): JsonResponse
    {
        $result = $award->delete();

        return $this->respondCondition($result, $award->id, 'course_award.destroy_failed');
    }

    public function search(Request $request, $searchString): JsonResponse
    {
        $awards = CourseAward::where('name', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($awards);
    }
}
