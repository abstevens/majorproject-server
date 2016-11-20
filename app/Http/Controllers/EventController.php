<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index(Event $event): JsonResponse
    {
        $events = $event::all();

        return $this->respondData($events);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
            'organizer_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'date_time' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'string|max:6',
            'limit_reservations' => 'integer',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $event = new Event($request->all());

        $result = $event->save();

        return $this->respondCondition($result, $event->id, 'event.store_failed');
    }

    public function show(Event $event): JsonResponse
    {
        return $this->respondData($event);
    }

    public function update(Request $request, int $eventId): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
            'organizer_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'date_time' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'string|max:6',
            'limit_reservations' => 'integer',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $event = new Event($request->all());

        $result = $event->save();

        return $this->respondCondition($result, $eventId, 'event.update_failed');
    }

    // TODO: Configure a Cron task to delete old entries

    public function destroy(Event $event): JsonResponse
    {
        $result = $event->delete();

        return $this->respondCondition($result, $event->id, 'event.destroy_failed');
    }

    public function search(Request $request, $searchString): JsonResponse
    {
        $events = Event::where('title', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($events);
    }
}
