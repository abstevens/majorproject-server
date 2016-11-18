<?php

namespace App\Http\Controllers;

use App\UserPayment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class UserPaymentController extends Controller
{
    public function index(UserPayment $payment): JsonResponse
    {

    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'amount' => 'string|max:255',
            'description' => 'string|max:255',
        ]);

        $this->respondErrorOnValidationFail($validator);

        $payment = new UserPayment($request->all());

        $result = $payment->save();

        return $this->respondCondition($result, $payment->id, 'user_payment.store_failed');
    }

    public function show(UserPayment $payment): JsonResponse
    {
        $payments = $payment::where('user_id', '=', $payment->id)->get();

        return $this->respondData($payments);
    }

    public function update(Request $request, int $paymentId): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'amount' => 'string|max:255',
            'description' => 'string|max:255',
        ]);

        $this->respondErrorOnValidationFail($validator);

//        $result = $request->save();
        $result = 1;

        return $this->respondCondition($result, $paymentId, 'user_payment.update_failed');
    }

    public function destroy(UserPayment $payment): JsonResponse
    {
        $result = $payment->delete();

        return $this->respondCondition($result, $payment->id, 'user_payment.destroy_failed');
    }

    public function search(Request $request, $searchString): JsonResponse
    {
        $payments = UserPayment::where('description', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($payments);
    }
}