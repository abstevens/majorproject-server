<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        // Store all users data in $users
        $users = $user::all();

        // Return users data
        return $this->respondData($users);
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
            'name' => 'required|string|unique:name|max:255',
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

            return $this->respondCondition($result, 'user.store_failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * TODO: perform id validation!!
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
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
            'name' => 'required|string|unique:name|max:255',
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

    public function search()
    {

    }
}
