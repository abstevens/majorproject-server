<?php
/**
 * Created by PhpStorm.
 * User: AlexStevens
 * Date: 22/08/16
 * Time: 21:57
 */

namespace App\Http\Controllers;

use App\CoursePrice;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

class CoursePriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CoursePrice $price
     * @return \Illuminate\Http\Response
     */
    public function index(CoursePrice $price)
    {
        // Store all prices data in $users
        $prices = $price::all();

        // Return prices data
        return $this->respondData($prices);
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
            'price' => 'required|string|max:255',
            'installments' => 'required|integer|max:5',
        ]);

        // Validate price request
        if ($validator->fails()) {
            return redirect('price/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create price model instance with request
            $price = new CoursePrice($request->all());

            // Save the price request
            $result = $price->save();

            return $this->respondCondition($result, 'price.store_failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * TODO: perform id validation!!
     *
     * @param CoursePrice $price
     * @return \Illuminate\Http\Response
     */
    public function show(CoursePrice $price)
    {
        return $this->respondData($price);
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
            'price' => 'required|string|max:255',
            'installments' => 'required|integer|max:5',
        ]);

        if ($validator->fails()) {
            return redirect('price/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create price model instance with request
            $price = new CoursePrice($request->all());

            // Save the price request
            $result = $price->save();

            return $this->respondCondition($result, 'price.update_failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CoursePrice $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoursePrice $price)
    {
        $result = $price->delete();

        return $this->respondCondition($result, 'price.destroy_failed');
    }

    public function search()
    {

    }
}