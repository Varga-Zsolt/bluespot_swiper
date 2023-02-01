<?php

namespace App\Http\Controllers;

use App\Http\Requests\SwipeRequest;
use App\Models\Swipe;

class SwipeController extends Controller
{
    public function swipe(SwipeRequest $request)
    {
        $swipe = Swipe::create($request->validated());

        return response()->json(
            [
                'message' => 'Swipe created'
            ],
            201
        );
    }
}
