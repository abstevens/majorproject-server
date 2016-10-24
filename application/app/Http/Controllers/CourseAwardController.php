<?php

namespace App\Http\Controllers;

use App\CourseAward;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

class CourseAwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CourseAward $award
     * @return \Illuminate\Http\Response
     */
    public function index(CourseAward $award)
    {
        // Store all awards data in $users
        $awards = $award::all();

        // Return awards data
        return $this->respondData($awards);
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
            'course_id' => 'required|integer',
            'name' => 'required|string|max:255',
        ]);

        // Validate addresses request
        if ($validator->fails()) {
            return redirect('award/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create address model instance with request
            $award = new CourseAward($request->all());

            // Save the address request
            $result = $award->save();

            return $this->respondCondition($result, 'award.store_failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * TODO: perform id validation!!
     *
     * @param  CourseAward $award
     * @return \Illuminate\Http\Response
     */
    public function show(CourseAward $award)
    {
        return $this->respondData($award);
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
            'course_id' => 'required|integer',
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('award/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create address model instance with request
            $award = new CourseAward($request->all());

            // Save the address request
            $result = $award->save();

            return $this->respondCondition($result, 'award.update_failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CourseAward $award
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseAward $award)
    {
        $result = $award->delete();

        return $this->respondCondition($result, 'award.destroy_failed');
    }

    public function search(Request $request, $searchString)
    {
        $awards = CourseAward::where('name', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($awards);
    }
}
