<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    public function index(): JsonResponse
    {
        //        $documents = scandir(public_path() . '/documents');
        $documents = $this->getDirContents(public_path() . '/documents');

        return $this->respondData($documents);
    }

    function getDirContents($dir, &$results = [])
    {
        $files = scandir($dir);

        foreach ($files as $key => $value) {
            $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
            if (!is_dir($path)) {
                $results[$value] = '/documents/'.$value;
            } elseif ($value != "." && $value != "..") {
                $this->getDirContents($path, $results[$value]);
            }
        }

        return $results;
    }

    public function store(Request $request): JsonResponse
    {
        //        $validator = Validator::make($request->all(), [
        //
        //        ]);
        //
        //        $this->respondErrorOnValidationFail($validator);
        //
        //        // Create user model instance with request
        //        $user = new User($request->all());
        //
        //        // Save the user request
        //        $result = $user->save();
        //
        //        return $this->respondCondition($result, null, '');
    }

    public function show(): JsonResponse
    {
        // TODO: have course id as folder name
        $documents = scandir(public_path() . '/documents');

        return $this->respondData($documents);
    }

    public function update(Request $request, $id): JsonResponse
    {
        //        $validator = Validator::make($request->all(), [
        //            'first_name' => 'required|string|max:255',
        //            'last_name' => 'required|string|max:255',
        //            'username' => 'required|string|unique:username|max:255',
        //            'email' => 'required|email|unique:email|max:255',
        //            'password' => 'required|string|max:60',
        //        ]);
        //
        //        if ($validator->fails()) {
        //            return redirect('user/')
        //                ->withErrors($validator)
        //                ->withInput();
        //        } else {
        //            // Create user model instance with request
        //            $user = new User($request->all());
        //
        //            // Save the user request
        //            $result = $user->save();
        //
        //            return $this->respondCondition($result, 'user.update_failed');
        //        }
    }

    public function destroy(User $user): JsonResponse
    {
        //        $result = $user->delete();
        //
        //        return $this->respondCondition($result, 'user.destroy_failed');
    }

    public function search(Request $request, $searchString)
    {
        //        return User::where('first_name', 'LIKE', "%{$searchString}%")
        //            ->orWhere('last_name', 'LIKE', "%{$searchString}%")
        //            ->get();
    }
}
