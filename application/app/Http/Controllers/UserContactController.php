<?php

namespace App\Http\Controllers;

use App\UserContact;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class UserContactController extends Controller
{
    public function index(UserContact $contact): JsonResponse
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

        $contact = new UserContact($request->all());

        $result = $contact->save();

        return $this->respondCondition($result, $contact->id, 'user_contact.store_failed');
    }

    public function show(UserContact $contact): JsonResponse
    {
        $contacts = $contact::where('user_id', '=', $contact->id)->get();

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

        $contact = new UserContact($request->all());

        $result = $contact->save();

        return $this->respondCondition($result, $contactId, 'user_contact.update_failed');
    }

    public function destroy(UserContact $contact): JsonResponse
    {
        $result = $contact->delete();

        return $this->respondCondition($result, $contact->id, 'user_contact.destroy_failed');
    }

    public function search(Request $request, $searchString): JsonResponse
    {
        $contacts = UserContact::where('type', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($contacts);
    }
}
