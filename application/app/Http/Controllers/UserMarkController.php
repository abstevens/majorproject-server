<?php
/**
 * Created by PhpStorm.
 * User: AlexStevens
 * Date: 22/08/16
 * Time: 21:57
 */

namespace App\Http\Controllers;

use App\UserMark;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;

class UserMarkController extends Controller
{
    public function index(UserMark $mark, int $userId): JsonResponse
    {
        // Store all marks data in $users
        $marks = $mark::where('user_id', '=', $userId)->get();

        // Return marks data
        return $this->respondData($marks);
    }

    public function store(Request $request): JsonResponse
    {
        // Set validation rules
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'assignment' => 'required|string|max:255',
            'percentage' => 'required|integer|max:3',
        ]);

        // Validate mark request
        if ($validator->fails()) {
            return redirect('mark/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create mark model instance with request
            $mark = new UserMark($request->all());

            // Save the mark request
            $result = $mark->save();

            return $this->respondCondition($result, 'mark.store_failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * TODO: perform id validation!!
     *
     * @param UserMark $mark
     * @return \Illuminate\Http\Response
     */
    public function show(UserMark $mark)
    {
        return $this->respondData($mark);
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
            'assignment' => 'required|string|max:255',
            'percentage' => 'required|integer|max:3',
        ]);

        if ($validator->fails()) {
            return redirect('mark/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create mark model instance with request
            $mark = new UserMark($request->all());

            // Save the mark request
            $result = $mark->save();

            return $this->respondCondition($result, 'mark.update_failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  UserMark $mark
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserMark $mark)
    {
        $result = $mark->delete();

        return $this->respondCondition($result, 'mark.destroy_failed');
    }

    public function search(Request $request, $searchString)
    {
        $marks = UserMark::where('assignment', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($marks);
    }
}