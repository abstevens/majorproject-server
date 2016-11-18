<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class SchoolController extends Controller
{
    public function index(School $school): JsonResponse
    {
        $schools = $school::all();

        return $this->respondData($schools);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        $this->respondErrorOnValidationFail($validator);

        $school = new School($request->all());

        $result = $school->save();

        return $this->respondCondition($result, $school->id, 'school.store_failed');
    }

    public function show(School $school): JsonResponse
    {
        return $this->respondData($school);
    }

    public function update(Request $request, int $schoolId): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        $this->respondErrorOnValidationFail($validator);

        $school = new School($request->all());

        $result = $school->save();

        return $this->respondCondition($result, $schoolId, 'school.update_failed');
    }

    public function destroy(School $school): JsonResponse
    {
        $result = $school->delete();

        return $this->respondCondition($result, $school->id, 'school.destroy_failed');
    }

    public function search(Request $request, $searchString): JsonResponse
    {
        $schools = School::where('name', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($schools);
    }
}
