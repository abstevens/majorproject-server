<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function index(Permission $permission): JsonResponse
    {
        $permissions = $permission::all();

        return $this->respondData($permissions);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
            'name' => 'required|string|max:255',
            'code' => 'integer|max:6',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $permission = new Permission($request->all());

        $result = $permission->save();

        return $this->respondCondition($result, $permission->id, 'permission.store_failed');
    }

    public function show(Permission $permission): JsonResponse
    {
        return $this->respondData($permission);
    }

    public function update(Request $request, int $permissionId): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
            'name' => 'required|string|max:255',
            'code' => 'integer|max:6',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $permission = new Permission($request->all());

        $result = $permission->save();

        return $this->respondCondition($result, $permissionId, 'permission.update_failed');
    }

    public function destroy(Permission $permission): JsonResponse
    {
        $result = $permission->delete();

        return $this->respondCondition($result, $permission->id, 'permission.destroy_failed');
    }

    public function search(Request $request, $searchString): JsonResponse
    {
        $permissions = Permission::where('name', 'LIKE', "%{$searchString}%")
            ->orWhere('code', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($permissions);
    }
}
