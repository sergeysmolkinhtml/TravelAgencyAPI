<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TravelRequest;
use App\Http\Resources\TravelResourse;
use App\Models\Travel;

class TravelController extends Controller
{
    /**
     * POST Travel
     *
     * Creates a new Travel record.
     *
     * @authenticated
     *
     * @response {"data":{"id":"996a36ca-2693-4901-9c55-7136e68d81d5","name":"My new travel 234","slug":"my-new-travel-234", ...}
     * @response 422 {"message":"The name has already been taken.","errors":{"name":["The name has already been taken."]}}
     */
    public function store(TravelRequest $request): TravelResourse
    {
        $travel = Travel::create($request->validated());

        return new TravelResourse($travel);
    }

    /**
     * PUT Travel
     *
     * Updates new Travel record.
     *
     * @authenticated
     *
     * @response {"data":{"id":"996a36ca-2693-4901-9c55-7136e68d81d5","name":"My new travel 234", ...}
     * @response 422 {"message":"The name has already been taken.","errors":{"name":["The name has already been taken."]}}
     */
    public function update(Travel $travel, TravelRequest $request): TravelResourse
    {
        $travel->update($request->validated());

        return new TravelResourse($travel);
    }
}
