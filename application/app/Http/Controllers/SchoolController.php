<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  School  $school
     * @return \Illuminate\Http\Response
     */
    public function index(School $school)
    {
        // Store all schools data
        $schools = $school::all();

        // Return schools data
        return $this->respondData($schools);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Set validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        // Validate schools request
        if ($validator->fails()) {
            return redirect('school/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create school model instance with request
            $school = new School($request->all());

            // Save the school request
            $result = $school->save();

            return $this->respondCondition($result, 'school.store_failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * TODO: perform id validation!!
     *
     * @param  School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        return $this->respondData($school);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // TODO: Need to fix this.

        // Set validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('school/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create school model instance with request
            $address = new School($request->all());

            // Save the school request
            $result = $address->save();

            return $this->respondCondition($result, 'school.update_failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        $result = $school->delete();

        return $this->respondCondition($result, 'school.destroy_failed');
    }

    public function search()
    {

    }
}
