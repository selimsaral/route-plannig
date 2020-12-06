<?php

namespace App\Http\Controllers;

use App\Helpers\GetLocations;
use App\Jobs\DirectionJob;
use App\Requests\RouteCalculateRequest;

class RouteController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function routeCalculate(RouteCalculateRequest $request)
    {
        $locations = (new GetLocations())->setAddressList($request->address)->locationDetails()->getLocations();

        $result = DirectionJob::dispatchNow($locations);

        return view('result', compact('result'));
    }
}
