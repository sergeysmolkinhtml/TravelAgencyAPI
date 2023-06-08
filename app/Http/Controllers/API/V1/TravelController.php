<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index()
    {
        return Travel::where('is_public', true)->get();
    }
}
