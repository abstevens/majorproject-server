<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index(Role $role): JsonResponse
    {
        $roles = $role::all();

        return $this->respondData($roles);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
            'name' => 'required|string|max:255',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $role = new Role($request->all());

        $result = $role->save();

        return $this->respondCondition($result, $role->id, 'role.store_failed');
    }

    public function show(Role $role): JsonResponse
    {
        return $this->respondData($role);
    }

    public function update(Request $request, int $roleId): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
            'name' => 'required|string|max:255',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $role = new Role($request->all());

        $result = $role->save();

        return $this->respondCondition($result, $roleId, 'role.update_failed');
    }

    public function destroy(Role $role): JsonResponse
    {
        $result = $role->delete();

        return $this->respondCondition($result, $role->id, 'role.destroy_failed');
    }

    public function search(Request $request, $searchString): JsonResponse
    {
        $roles = Role::where('name', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($roles);
    }
}
