<?php
/**
 * Created by PhpStorm.
 * User: AlexStevens
 * Date: 22/08/16
 * Time: 21:57
 */

namespace App\Http\Controllers;

use App\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;

class UserAddressController extends Controller
{
    public function index(UserAddress $address, int $userId): JsonResponse
    {
        // Store all addresses data in $users
        $addresses = $address::where('user_id', '=', $userId)->get();

        return $this->respondData($addresses);
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
            $address = new UserAddress($request->all());

            // Save the address request
            $result = $address->save();

            return $this->respondCondition($result, 'address.store_failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * TODO: perform id validation!!
     *
     * @param UserAddress $address
     * @return \Illuminate\Http\Response
     */
    public function show(UserAddress $address)
    {
        return $this->respondData($address);
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
            $address = new UserAddress($request->all());

            // Save the address request
            $result = $address->save();

            return $this->respondCondition($result, 'address.update_failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  UserAddress $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAddress $address)
    {
        $result = $address->delete();

        return $this->respondCondition($result, 'address.destroy_failed');
    }

    public function search(Request $request, $searchString)
    {
        $addresses = UserAddress::where('street', 'LIKE', "%{$searchString}%")
            ->orWhere('city', 'LIKE', "%{$searchString}%")
            ->orWhere('country', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($addresses);
    }
}