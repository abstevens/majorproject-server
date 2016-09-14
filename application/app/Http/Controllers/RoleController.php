<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role)
    {
        // Store all roles data
        $roles = $role::all();

        // Return roles data
        return $this->respondData($roles);
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
        ]);

        // Validate roles request
        if ($validator->fails()) {
            return redirect('role/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create role model instance with request
            $role = new Role($request->all());

            // Save the role request
            $result = $role->save();

            return $this->respondCondition($result, 'role.store_failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * TODO: perform id validation!!
     *
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return $this->respondData($role);
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
        ]);

        if ($validator->fails()) {
            return redirect('role/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create role model instance with request
            $role = new Role($request->all());

            // Save the role request
            $result = $role->save();

            return $this->respondCondition($result, 'role.update_failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $result = $role->delete();

        return $this->respondCondition($result, 'role.destroy_failed');
    }

    public function search()
    {

    }
}
