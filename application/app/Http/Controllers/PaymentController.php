<?php
/**
 * Created by PhpStorm.
 * User: AlexStevens
 * Date: 22/08/16
 * Time: 21:57
 */

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function index(Payment $payment)
    {
        // Store all payments data
        $payments = $payment::all();

        // Return payments data
        return $this->respondData($payments);
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
            $payment = new Payment($request->all());

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
    public function show(Payment $payment)
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

        if ($validator->fails()) {
            return redirect('payment/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create payment model instance with request
            $payment = new Payment($request->all());

            // Save the payment request
            $result = $payment->save();

            return $this->respondCondition($result, 'payment.update_failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $result = $payment->delete();

        return $this->respondCondition($result, 'payment.destroy_failed');
    }

    public function search()
    {

    }
}