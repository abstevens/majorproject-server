<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(User $user): JsonResponse
    {
        $users = $user::all();

        return $this->respondData($users);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|max:60',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        // Create user model instance with request
        // TODO: Step for encryption password
        $user = new User($request->all());

        // Save the user request
        $result = $user->save();

        return $this->respondCondition($result, $user->id, 'user.store_failed');
    }

    public function show(User $user): JsonResponse
    {
        $user = User::with('marks', 'details', 'contacts', 'addresses', 'courses.classes', 'schoolUsers')
                ->find($user->id);

        return $this->respondData($user);
    }

    public function update(Request $request, $id): JsonResponse
    {
        // TODO: Need to fix this.

        $validator = Validator::make(
            $request->all(),
            [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|unique:username|max:255',
            'email' => 'required|email|unique:email|max:255',
            'password' => 'required|string|max:60',
            ]
        );

        if ($validator->fails()) {
            return redirect('user/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create user model instance with request
            $user = new User($request->all());

            // Save the user request
            $result = $user->save();

            return $this->respondCondition($result, 'user.update_failed');
        }
    }

    public function destroy(User $user): JsonResponse
    {
        $result = $user->delete();

        return $this->respondCondition($result, 'user.destroy_failed');
    }

    public function search(Request $request, $searchString): JsonResponse
    {
        $users = User::where('first_name', 'LIKE', "%{$searchString}%")
            ->orWhere('last_name', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($users);
    }
}
