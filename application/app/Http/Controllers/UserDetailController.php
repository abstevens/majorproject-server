<?php
/**
 * Created by PhpStorm.
 * User: AlexStevens
 * Date: 22/08/16
 * Time: 21:57
 */

namespace App\Http\Controllers;

use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param UserDetail $detail
     * @return \Illuminate\Http\Response
     */
    public function index(UserDetail $detail)
    {
        // Store all details data in $users
        $details = $detail::all();

        // Return details data
        return $this->respondData($details);
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
            'type' => 'required|string|max:255',
            'value' => 'required|string|max:255',
        ]);

        // Validate addresses request
        if ($validator->fails()) {
            return redirect('detail/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create address model instance with request
            $detail = new UserDetail($request->all());

            // Save the address request
            $result = $detail->save();

            return $this->respondCondition($result, 'detail.store_failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * TODO: perform id validation!!
     *
     * @param UserDetail $detail
     * @return \Illuminate\Http\Response
     */
    public function show(UserDetail $detail)
    {
        return $this->respondData($detail);
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
            'type' => 'required|string|max:255',
            'value' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('detail/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create address model instance with request
            $detail = new UserDetail($request->all());

            // Save the address request
            $result = $detail->save();

            return $this->respondCondition($result, 'detail.update_failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  UserDetail $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDetail $detail)
    {
        $result = $detail->delete();

        return $this->respondCondition($result, 'detail.destroy_failed');
    }

    public function search()
    {

    }
}