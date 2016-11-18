<?php

namespace App\Http\Controllers;

use App\SchoolAddress;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class SchoolAddressController extends Controller
{
    public function index(SchoolAddress $address): JsonResponse
    {

    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'street' => 'string|max:255',
            'city' => 'string|max:255',
            'country' => 'string|max:255',
            'postcode' => 'string|max:32',
        ]);

        $this->respondErrorOnValidationFail($validator);

        $address = new SchoolAddress($request->all());

        $result = $address->save();

        return $this->respondCondition($result, $address->id, 'school_address.store_failed');
    }

    public function show(SchoolAddress $address): JsonResponse
    {
        $addresses = $address::where('school_id', '=', $address->id)->get();

        return $this->respondData($addresses);
    }

    public function update(Request $request, int $addressId): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'street' => 'string|max:255',
            'city' => 'string|max:255',
            'country' => 'string|max:255',
            'postcode' => 'string|max:32',
        ]);

        $this->respondErrorOnValidationFail($validator);

        $address = new SchoolAddress($request->all());

        $result = $address->save();

        return $this->respondCondition($result, $addressId, 'school_address.update_failed');
    }

    public function destroy(SchoolAddress $address): JsonResponse
    {
        $result = $address->delete();

        return $this->respondCondition($result, $address->id, 'school_address.destroy_failed');
    }

    public function search(Request $request, $searchString): JsonResponse
    {
        $addresses = SchoolAddress::where('street', 'LIKE', "%{$searchString}%")
            ->orWhere('city', 'LIKE', "%{$searchString}%")
            ->orWhere('country', 'LIKE', "%{$searchString}%")
            ->orWhere('postcode', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($addresses);
    }
}