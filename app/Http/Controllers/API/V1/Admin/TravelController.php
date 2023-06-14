<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TravelRequest;
use App\Http\Resources\TravelResourse;
use App\Models\Travel;

class TravelController extends Controller
{
    public function store(TravelRequest $request): TravelResourse
    {
        $travel = Travel::create($request->validated());

        return new TravelResourse($travel);
    }

    public function update(Travel $travel, TravelRequest $request): TravelResourse
    {
        $travel->update($request->validated());

        return new TravelResourse($travel);
    }
}
