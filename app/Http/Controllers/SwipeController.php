<?php

namespace App\Http\Controllers;

use App\Events\SwipeCreatedEvent;
use App\Http\Requests\SwipeRequest;
use App\Models\Swipe;

class SwipeController extends Controller
{
    public function swipe(SwipeRequest $request)
    {
        $swipe = Swipe::create($request->validated());
        event(new SwipeCreatedEvent($swipe));

        return response()->json(
            [
                'message' => 'Swipe created'
            ],
            201
        );
    }
}
