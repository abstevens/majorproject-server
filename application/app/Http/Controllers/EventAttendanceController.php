<?php
/**
 * Created by PhpStorm.
 * User: AlexStevens
 * Date: 22/08/16
 * Time: 21:57
 */

namespace App\Http\Controllers;

use App\EventAttendance;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

class EventAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param EventAttendance $attendance
     * @return \Illuminate\Http\Response
     */
    public function index(EventAttendance $attendance)
    {
        // Store all attendances data in $users
        $attendances = $attendance::all();

        // Return attendances data
        return $this->respondData($attendances);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Set validation rules
        $validator = Validator::make($request->all(), [
            'event_id' => 'required|integer',
            'user_id' => 'required|integer',
            'status' => 'required|integer',
        ]);

        // Validate attendance request
        if ($validator->fails()) {
            return redirect('event_attendance/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create attendance model instance with request
            $attendance = new EventAttendance($request->all());

            // Save the attendance request
            $result = $attendance->save();

            return $this->respondCondition($result, 'attendance.store_failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * TODO: perform id validation!!
     *
     * @param EventAttendance $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(EventAttendance $attendance)
    {
        return $this->respondData($attendance);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // TODO: Need to fix this.

        // Set validation rules
        $validator = Validator::make($request->all(), [
            'event_id' => 'required|integer',
            'user_id' => 'required|integer',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect('attendance/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create attendance model instance with request
            $attendance = new EventAttendance($request->all());

            // Save the attendance request
            $result = $attendance->save();

            return $this->respondCondition($result, 'attendance.update_failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  EventAttendance $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventAttendance $attendance)
    {
        $result = $attendance->delete();

        return $this->respondCondition($result, 'attendance.destroy_failed');
    }

    public function search()
    {

    }
}