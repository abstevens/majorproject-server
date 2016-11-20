<?php

namespace App\Http\Controllers;

use App\SchoolContact;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class SchoolContactController extends Controller
{
    public function index(SchoolContact $contact): JsonResponse
    {
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
            'user_id' => 'required|integer',
            'type' => 'string|max:255',
            'value' => 'string|max:255',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $contact = new SchoolContact($request->all());

        $result = $contact->save();

        return $this->respondCondition($result, $contact->id, 'school_contact.store_failed');
    }

    public function show(SchoolContact $contact): JsonResponse
    {
        $contacts = $contact::where('school_id', '=', $contact->id)->get();

        return $this->respondData($contacts);
    }

    public function update(Request $request, int $contactId): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
            'user_id' => 'required|integer',
            'type' => 'string|max:255',
            'value' => 'string|max:255',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $contact = new SchoolContact($request->all());

        $result = $contact->save();

        return $this->respondCondition($result, $contactId, 'school_contact.update_failed');
    }

    public function destroy(SchoolContact $contact): JsonResponse
    {
        $result = $contact->delete();

        return $this->respondCondition($result, $contact->id, 'school_contact.destroy_failed');
    }

    public function search(Request $request, $searchString): JsonResponse
    {
        $contacts = SchoolContact::where('value', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($contacts);
    }
}
