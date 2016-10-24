<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    public function index(): JsonResponse
    {
        $documents = scandir(public_path() . '/documents');

        return $this->respondData($documents);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

        ]);

        $this->respondErrorOnValidationFail($validator);

        // Create user model instance with request
        $user = new User($request->all());

        // Save the user request
        $result = $user->save();

        return $this->respondCondition($result, null, '');
    }

    /**
     * Display the specified resource.
     *
     * TODO: perform id validation!!
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // TODO: have course id as folder name
        $documents = scandir(public_path() . '/documents');

        return $this->respondData($user);
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

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|unique:username|max:255',
            'email' => 'required|email|unique:email|max:255',
            'password' => 'required|string|max:60',
        ]);

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $result = $user->delete();

        return $this->respondCondition($result, 'user.destroy_failed');
    }

    public function search(Request $request, $searchString)
    {
        // $criteria = Last Name First Name
        return User::where('first_name', 'LIKE', "%{$searchString}%")
            ->orWhere('last_name', 'LIKE', "%{$searchString}%")
            ->get();
    }
}
