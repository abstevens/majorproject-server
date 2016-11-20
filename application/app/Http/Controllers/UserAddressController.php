<?php

namespace App\Http\Controllers;

use App\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class UserAddressController extends Controller
{
    public function index(UserAddress $address): JsonResponse
    {
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
            'user_id' => 'required|integer',
            'street' => 'string|max:255',
            'city' => 'string|max:255',
            'country' => 'string|max:255',
            'postcode' => 'string|max:32',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $address = new UserAddress($request->all());

        $result = $address->save();

        return $this->respondCondition($result, $address->id, 'user_address.store_failed');
    }

    public function show(UserAddress $address): JsonResponse
    {
        $addresses = $address::where('user_id', '=', $address->id)->get();

        return $this->respondData($addresses);
    }

    public function update(Request $request, int $addressId): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
            'user_id' => 'required|integer',
            'street' => 'string|max:255',
            'city' => 'string|max:255',
            'country' => 'string|max:255',
            'postcode' => 'string|max:32',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $address = new UserAddress($request->all());

        $result = $address->save();

        return $this->respondCondition($result, $addressId, 'user_address.update_failed');
    }

    public function destroy(UserAddress $address): JsonResponse
    {
        $result = $address->delete();

        return $this->respondCondition($result, $address->id, 'user_address.destroy_failed');
    }

    public function search(Request $request, $searchString): JsonResponse
    {
        $addresses = UserAddress::where('street', 'LIKE', "%{$searchString}%")
            ->orWhere('city', 'LIKE', "%{$searchString}%")
            ->orWhere('country', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($addresses);
    }
}
