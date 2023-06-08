<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TravelResourse;
use App\Models\Travel;


class TravelController extends Controller
{

    public function index()
    {
        $travels = Travel::where('is_public',true)->paginate();

        return TravelResourse::collection($travels);
    }
}
