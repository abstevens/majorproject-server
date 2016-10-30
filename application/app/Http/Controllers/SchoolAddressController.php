<?php
/**
 * Created by PhpStorm.
 * User: AlexStevens
 * Date: 22/08/16
 * Time: 21:57
 */

namespace App\Http\Controllers;

use App\SchoolAddress;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;

class SchoolAddressController extends Controller
{
    public function index(SchoolAddress $address, int $schoolId): JsonResponse
    {
        // Store all addresses data in $users
        $addresses = $address::where('school_id', '=', $schoolId)->get();

        return $this->respondData($addresses);
    }

    public function store(Request $request): JsonResponse
    {
        // Set validation rules
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'postcode' => 'required|string|max:32',
        ]);

        // Validate addresses request
        if ($validator->fails()) {
            return redirect('address/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create address model instance with request
            $address = new SchoolAddress($request->all());

            // Save the address request
            $result = $address->save();

            return $this->respondCondition($result, 'address.store_failed');
        }
    }

    public function show(SchoolAddress $address): JsonResponse
    {
        return $this->respondData($address);
    }

    public function update(Request $request, $id): JsonResponse
    {
        // TODO: Need to fix this.

        // Set validation rules
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'postcode' => 'required|string|max:32',
        ]);

        if ($validator->fails()) {
            return redirect('address/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create address model instance with request
            $address = new SchoolAddress($request->all());

            // Save the address request
            $result = $address->save();

            return $this->respondCondition($result, 'address.update_failed');
        }
    }

    public function destroy(SchoolAddress $address): JsonResponse
    {
        $result = $address->delete();

        return $this->respondCondition($result, 'address.destroy_failed');
    }

    public function search(Request $request, $searchString)
    {
        $addresses = SchoolAddress::where('street', 'LIKE', "%{$searchString}%")
            ->orWhere('city', 'LIKE', "%{$searchString}%")
            ->orWhere('country', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($addresses);
    }
}