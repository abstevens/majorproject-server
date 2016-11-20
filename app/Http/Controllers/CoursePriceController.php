<?php

namespace App\Http\Controllers;

use App\CoursePrice;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoursePriceController extends Controller
{
    public function index(CoursePrice $price): JsonResponse
    {
        $prices = $price::all();

        return $this->respondData($prices);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
            'course_id' => 'required|integer',
            'price' => 'required|string|max:255',
            'installments' => 'integer|max:5',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $price = new CoursePrice($request->all());

        $result = $price->save();

        return $this->respondCondition($result, $price->id, 'course_price.store_failed');
    }

    public function show(CoursePrice $price): JsonResponse
    {
        return $this->respondData($price);
    }

    public function update(Request $request, int $priceId): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
            'course_id' => 'required|integer',
            'price' => 'required|string|max:255',
            'installments' => 'integer|max:5',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $price = new CoursePrice($request->all());

        $result = $price->save();

        return $this->respondCondition($result, $priceId, 'course_price.update_failed');
    }

    public function destroy(CoursePrice $price): JsonResponse
    {
        $result = $price->delete();

        return $this->respondCondition($result, $price->id, 'course_price.destroy_failed');
    }

    public function search(Request $request, $searchString): JsonResponse
    {
        $prices = CoursePrice::where('price', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($prices);
    }
}
