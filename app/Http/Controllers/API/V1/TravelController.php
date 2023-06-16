<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TravelResourse;
use App\Models\Travel;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Public endpoints
 */
class TravelController extends Controller
{
    /**
     * GET Travels
     *
     * Returns paginated list of travels.
     *
     * @queryParam page integer Page number. Example: 1
     *
     * @response {"data":[{"id":"9958e389-5edf-48eb-8ecd-e058985cf3ce","name":"First travel", ...}}
     */
    public function index(): AnonymousResourceCollection
    {
        $travels = Travel::where('is_public', true)
            ->paginate(config('app.paginationPerPage.travels'));

        return TravelResourse::collection($travels);
    }
}
