<?php
/**
 * Created by PhpStorm.
 * User: AlexStevens
 * Date: 22/08/16
 * Time: 21:57
 */

namespace App\Http\Controllers;

use App\SchoolContact;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;

class SchoolContactController extends Controller
{
    public function index(SchoolContact $contact, int $schoolId): JsonResponse
    {
        // Store all contacts data in $users
        $contacts = $contact::where('school_id', '=', $schoolId)->get();

        return $this->respondData($contacts);
    }

    public function store(Request $request): JsonResponse
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
            $contact = new SchoolContact($request->all());

            // Save the contact request
            $result = $contact->save();

            return $this->respondCondition($result, 'contact.store_failed');
        }
    }

    public function show(SchoolContact $contact): JsonResponse
    {
        return $this->respondData($contact);
    }

    public function update(Request $request, $id): JsonResponse
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
            $contact = new SchoolContact($request->all());

            // Save the contact request
            $result = $contact->save();

            return $this->respondCondition($result, 'contact.update_failed');
        }
    }

    public function destroy(SchoolContact $contact): JsonResponse
    {
        $result = $contact->delete();

        return $this->respondCondition($result, 'contact.destroy_failed');
    }

    public function search(Request $request, $searchString): JsonResponse
    {
        $contacts = SchoolContact::where('value', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($contacts);
    }
}