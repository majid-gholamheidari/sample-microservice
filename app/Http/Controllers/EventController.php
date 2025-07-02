<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Traits\ApiResponse;
use App\Jobs\StoreEventJob;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{

    use ApiResponse;

    /**
     * @param StoreEventRequest $request
     * @return JsonResponse
     */
    public function store(StoreEventRequest $request): \Illuminate\Http\JsonResponse
    {
        dispatch(new StoreEventJob(
            $request->user_id,
            $request->event_name,
            $request->payload ?? null
        ));
        return $this->successResponse([], 'Event stored successfully.');
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $limit = $request->get('limit', 10);
        $page = $request->get('page', 1);

        $events = Event::query()
            ->when($request->has('from'), function ($query) use ($request) {
                $query->where('created_at', '>=', $request->get('from'));
            })
            ->when($request->has('user_id'), function ($query) use ($request) {
                $query->where('user_id', $request->get('user_id'));
            })
            ->paginate($limit, ['*'], 'page', $page);

        return $this->successResponse([
            'events' => $events->items(),
            'pagination' => [
                'current_page' => $events->currentPage(),
                'per_page'     => $events->perPage(),
                'last_page'    => $events->lastPage(),
                'total'        => $events->total(),
            ]
        ], 'Events retrieved successfully.');
    }

}
