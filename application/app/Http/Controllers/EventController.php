<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

use App\Http\Requests;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Store all events with attendances
        $events = Event::with('attendances')->get();

        // Return a JSON data
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
        // TODO: Validate the request
        // Have a look if Laravel's validation can be of any use
        // https://laravel.com/docs/5.2/validation#quick-writing-the-validation-logic

        // Create event model instance
        $event = new Event();

        // Set attributes
        $event->organizer_id = $request->organizer_id;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->date_time = $request->date_time;
        $event->location = $request->location;
        $event->price = $request->price;
        $event->limit_reservations = $request->limit_reservations;

        // Call and store save method
        $result = $event->save();

        // Return JSON response if save succeeded or not
        return $this->respondCondition($result, 'event.store_failed');
    }

    /**
     * Display the specified resource.
     *
     * TODO: perform id validation!!
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Store an event record
        $event = Event::find($id);

        // Return a JSON data
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
        // Retrieve event model instance
        $event = Event::find($id);

//        TODO: Use Auth!
//        $user = Auth::user();
//        if ($user->id !== $event->organizer_id) return $this->respondError('Only the organizer of this event is allowed to make changes'); // json['error' => error_msg, 'status' => StatusCode::FAILED]

        // Set attributes
//        $event->organizer_id = $request->organizer_id;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->date_time = $request->date_time;
        $event->location = $request->location;
        $event->price = $request->price;
        $event->limit_reservations = $request->limit_reservations;

        // Call and store save method
        $result = $event->save();

        // Return JSON response if save succeeded or not
        return $this->respondCondition($result, 'event.update_failed');
    }

    /**
     * TODO: Configure a Cron task to delete old entries
     *
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieve event model instance
        $event = Event::find($id);

        // Call and store delete method
        $result = $event->delete();

        // Return JSON response if save succeeded or not
        return $this->respondCondition($result, 'event.destroy_failed');
    }
}
