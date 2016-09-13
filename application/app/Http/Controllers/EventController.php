<?php
/**
 * Created by PhpStorm.
 * User: AlexStevens
 * Date: 22/08/16
 * Time: 20:40
 */

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Event $event
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event)
    {
        // Store all events data in $users
        $events = $event::all();

        // Return events data
        return $this->respondData($events);
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
            'organizer_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'date_time' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'string|max:6',
            'limit_reservations' => 'integer',
        ]);

        // Validate events request
        if ($validator->fails()) {
            return redirect('event/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create event model instance with request
            $event = new Event($request->all());

            // Save the event request
            $result = $event->save();

            return $this->respondCondition($result, 'event.store_failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * TODO: perform id validation!!
     *
     * @param  Event $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return $this->respondData($event);
    }

    /**
     * Update the specified resource in the DB.
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
            'organizer_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'date_time' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'string|max:6',
            'limit_reservations' => 'integer',
        ]);

        if ($validator->fails()) {
            return redirect('event/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create event model instance with request
            $event = new Event($request->all());

            // Save the event request
            $result = $event->save();

            return $this->respondCondition($result, 'event.update_failed');
        }
    }

    /**
     * TODO: Configure a Cron task to delete old entries
     *
     * Remove the specified resource from storage.
     *
     * @param  Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $result = $event->delete();

        return $this->respondCondition($result, 'event.destroy_failed');
    }

    public function search()
    {

    }
}
