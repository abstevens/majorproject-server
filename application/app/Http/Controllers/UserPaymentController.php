<?php
/**
 * Created by PhpStorm.
 * User: AlexStevens
 * Date: 22/08/16
 * Time: 21:57
 */

namespace App\Http\Controllers;

use App\UserPayment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;

class UserPaymentController extends Controller
{
    public function index(UserPayment $payment, int $userId): JsonResponse
    {
        // Store all payments data
        $payments = $payment::where('user_id', '=', $userId)->get();

        // Return payments data
        return $this->respondData($payments);
    }

    public function store(Request $request, int $userId): JsonResponse
    {
        // Set validation rules
        $validator = Validator::make($request->all(), [
            'amount' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        // Validate payments request
        if ($validator->fails()) {
            return redirect('payment/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create payment model instance with request
            $payment = new UserPayment($request->all());
            $payment->user_id = $userId;

            // Save the payment request
            $result = $payment->save();

            return $this->respondCondition($result, 'payment.store_failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * TODO: perform id validation!!
     *
     * @param Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function show(UserPayment $payment)
    {
        return $this->respondData($payment);
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
            'amount' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $this->respondErrorOnValidationFail($validator);

        // Create payment model instance with request
        $payment = new UserPayment($request->all());

        // Save the payment request
        $result = $payment->save();

        return $this->respondCondition($result, 'payment.update_failed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPayment $payment)
    {
        $result = $payment->delete();

        return $this->respondCondition($result, 'payment.destroy_failed');
    }

    public function search()
    {

    }
}