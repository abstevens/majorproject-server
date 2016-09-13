<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function index(Permission $permission)
    {
        // Store all permissions data
        $permissions = $permission::all();

        // Return permissions data
        return $this->respondData($permissions);
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
            'code' => 'required|integer|max:6',
        ]);

        // Validate permissions request
        if ($validator->fails()) {
            return redirect('permission/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create permission model instance with request
            $permission = new Permission($request->all());

            // Save the permission request
            $result = $permission->save();

            return $this->respondCondition($result, 'permission.store_failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * TODO: perform id validation!!
     *
     * @param  Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return $this->respondData($permission);
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
            'code' => 'required|integer|max:6',
        ]);

        if ($validator->fails()) {
            return redirect('permission/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create permission model instance with request
            $permission = new Permission($request->all());

            // Save the permission request
            $result = $permission->save();

            return $this->respondCondition($result, 'permission.update_failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $result = $permission->delete();

        return $this->respondCondition($result, 'permission.destroy_failed');
    }

    public function search()
    {

    }
}
