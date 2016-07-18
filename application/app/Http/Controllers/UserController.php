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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Data from the model (all school DB entries)
        $users = User::all();

        // Return a JSON data
        return $this->respondData($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO: Validate the request

        // Create user model instance
        $user = new User();

        // Set attributes
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;

        // Call the save method
        return $this->respondStatus($user->save());
    }

    /**
     * Display the specified resource.
     *
     * TODO: perform id validation!!
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Store an event record
        $user = User::find($id);

        // Return a JSON data
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
        // Retrieve user model instance
        $userLoggedIn = User::find($id);

        $userProfile = Auth::user();
        if ($userProfile->id !== $userLoggedIn->id) return $this->respondError('Only the profile of this user is allowed to make changes'); // json['error' => error_msg, 'status' => StatusCode::FAILED]

        // Set attributes
        $userLoggedIn->username = $request->username;
        $userLoggedIn->email = $request->email;
        $userLoggedIn->password = $request->password;

        // Call the save method
        return $this->respondStatus($userLoggedIn->save());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
