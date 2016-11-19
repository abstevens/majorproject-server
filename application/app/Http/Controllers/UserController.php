<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(User $user): JsonResponse
    {
        $user = User::with('marks', 'details', 'contacts', 'addresses', 'courses.classes', 'schoolUsers')
                ->find($this->user->id);

        return $this->respondData($user);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|max:60',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        // TODO: Step for encryption password
        $user = new User($request->all());

        $result = $user->save();

        return $this->respondCondition($result, $user->id, 'user.store_failed');
    }

    public function show(User $user): JsonResponse
    {
        return $this->respondData($user);
    }

    public function update(Request $request): JsonResponse
    {
        // TODO: Need to fix this.
        $user = auth()->user();

        $validator = Validator::make(
            $request->all(), [
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'email' => 'email|unique:users|max:255',
            'password' => 'string|max:60',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $result = $user->save();

        return $this->respondCondition($result, $user->id, 'user.update_failed');
    }

    public function destroy(User $user): JsonResponse
    {
        $result = $user->delete();

        return $this->respondCondition($result, $user->id, 'user.destroy_failed');
    }

    public function search(Request $request, $searchString): JsonResponse
    {
        $users = User::where('first_name', 'LIKE', "%{$searchString}%")
            ->orWhere('last_name', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($users);
    }
}
