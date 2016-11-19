<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function index(Course $course): JsonResponse
    {
        $courses = $course::all();

        return $this->respondData($courses);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(), [
            'name' => 'required|string|max:255',
            'code' => 'int|max:255',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $course = new Course($request->all());

        $result = $course->save();

        return $this->respondCondition($result, $course->id, 'course.store_failed');
    }

    public function show(Course $course): JsonResponse
    {
        return $this->respondData($course);
    }

    public function update(Request $request, int $courseId): JsonResponse
    {
        $validator = Validator::make(
            $request->all(), [
            'name' => 'required|string|max:255',
            'code' => 'int|max:255',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $address = new Course($request->all());

        $result = $address->save();

        return $this->respondCondition($result, $courseId, 'course.update_failed');
    }

    public function destroy(Course $course): JsonResponse
    {
        $result = $course->delete();

        return $this->respondCondition($result, $course->id, 'course.destroy_failed');
    }

    public function search(Request $request, $searchString): JsonResponse
    {
        $courses = Course::where('name', 'LIKE', "%{$searchString}%")
            ->orWhere('code', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($courses);
    }
}
