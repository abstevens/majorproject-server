<?php

namespace App\Http\Controllers;

use App\EventAttendance;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventAttendanceController extends Controller
{
    public function index(EventAttendance $attendance): JsonResponse
    {
        $attendances = $attendance::all();

        return $this->respondData($attendances);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'event_id' => 'required|integer',
            'user_id' => 'required|integer',
            'status' => 'required|integer',
        ]);

        $this->respondErrorOnValidationFail($validator);

        $attendance = new EventAttendance($request->all());

        $result = $attendance->save();

        return $this->respondCondition($result, $attendance->id, 'event_attendance.store_failed');
    }

    public function show(EventAttendance $attendance): JsonResponse
    {
        return $this->respondData($attendance);
    }

    public function update(Request $request, int $attendanceId): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|integer',
        ]);

        $this->respondErrorOnValidationFail($validator);

        $attendance = new EventAttendance($request->all());

        $result = $attendance->save();

        return $this->respondCondition($result, $attendanceId, 'event_attendance.update_failed');
    }

    public function destroy(EventAttendance $attendance): JsonResponse
    {
        $result = $attendance->delete();

        return $this->respondCondition($result, $attendance->id, 'event_attendance.destroy_failed');
    }

    public function search(Request $request, $searchString): JsonResponse
    {
        $attendance = EventAttendance::where('event_id', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($attendance);
    }
}