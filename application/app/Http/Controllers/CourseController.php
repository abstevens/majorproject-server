<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Course $course
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course)
    {
        // Store all addresses data in $users
        $courses = $course::all();

        // Return addresses data
        return $this->respondData($courses);
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
            'name' => 'required|string|max:255',
            'code' => 'int|max:255',
        ]);

        // Validate courses request
        if ($validator->fails()) {
            return redirect('course/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create course model instance with request
            $course = new Course($request->all());

            // Save the course request
            $result = $course->save();

            return $this->respondCondition($result, 'course.store_failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * TODO: perform id validation!!
     *
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return $this->respondData($course);
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
            'name' => 'required|string|max:255',
            'code' => 'int|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('address/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create course model instance with request
            $address = new Course($request->all());

            // Save the course request
            $result = $address->save();

            return $this->respondCondition($result, 'course.update_failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $result = $course->delete();

        return $this->respondCondition($result, 'address.destroy_failed');
    }

    public function search(Request $request, $searchString)
    {
        $courses = Course::where('name', 'LIKE', "%{$searchString}%")
            ->orWhere('code', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($courses);
    }
}
