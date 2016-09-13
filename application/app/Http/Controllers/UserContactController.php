<?php
/**
 * Created by PhpStorm.
 * User: AlexStevens
 * Date: 22/08/16
 * Time: 21:57
 */

namespace App\Http\Controllers;

use App\UserContact;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

class UserContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param UserContact $contact
     * @return \Illuminate\Http\Response
     */
    public function index(UserContact $contact)
    {
        // Store all contacts data in $users
        $contacts = $contact::all();

        // Return contacts data
        return $this->respondData($contacts);
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

        // Validate contact request
        if ($validator->fails()) {
            return redirect('contact/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create contact model instance with request
            $contact = new UserContact($request->all());

            // Save the contact request
            $result = $contact->save();

            return $this->respondCondition($result, 'contact.store_failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * TODO: perform id validation!!
     *
     * @param UserContact $contact
     * @return \Illuminate\Http\Response
     */
    public function show(UserContact $contact)
    {
        return $this->respondData($contact);
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
            return redirect('contact/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create contact model instance with request
            $contact = new UserContact($request->all());

            // Save the contact request
            $result = $contact->save();

            return $this->respondCondition($result, 'contact.update_failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  UserContact $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserContact $contact)
    {
        $result = $contact->delete();

        return $this->respondCondition($result, 'contact.destroy_failed');
    }

    public function search()
    {

    }
}