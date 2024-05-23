<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewtralController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $url = 'https://qa.newtrul.com';
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYmNlZWIyODMwM2I3OTUwYjg4NTA4NWQ0MWNhNzcyNzNmZDIyOThhZmFhZjZjNjBlMDU3ZDQyN2E3N2I4MDAzZmJjN2RmMWYyZWRiZDE1OGQiLCJpYXQiOjE2MTYxNTYzNzgsIm5iZiI6MTYxNjE1NjM3OCwiZXhwIjo0NzcxODMzNTc4LCJzdWIiOiIxNjE0Iiwic2NvcGVzIjpbXX0.G9wLK4RZxTo0kJRZUbNAmGe65IATywoPOpiOlmP5FgpZMwOYizPwAwyTPpb8KEiHrMoXnSYWQ3DXwZsv7BIc5DwFYn7L9Jl5drXSTNFiPsfXjWwm08IWh0kx1RwbgbbtNqfNDjZK8oxS26-DX7jSEATZuue7drbOODZQ2YgT6e5uyXXWHp9Nqh7vi3HBtL8txC8If0-mIxmDyREaT3z0Q9g4hW_WRw4jS0dyJwSJ-4FR05bU6TBY7a-hpv4SpYT40NRTanug5zKRgJpYNUvRQqmOW1cgRqJgFO1uIyZ2STQW3gu1Y9iRBPSCiOl4-FlHhVw9vj-sY7WdPx4NjvBLCJ9j5fxzhOhb5GUCr9zCiQlO-xg9u3LCO7r54IsUtRKsKOClzXNUuGfJzr0RMdBn2fSl4zRgj3MRarbOui-TiN0Xpil6aVJKN7SEvGNViBSZygHVJwNM4KK_If6zc3HxkHuOJZAW6iWBaFB6bnb3SutC6trF_hDYy-uNgU1NRz7Mrz6HK9pLtv7QLQ1q38hL3awaLGDmJ8XrfZZ-LVUFeXgDeM1Vdcfo4NhZ-Apzlim9XL7Pq8XIWeU7hmutqhVVyyNaWFkZxhRc-IrxNhmX_6hhnjH5-4wJ_sGkJAcJo3it_aQfgBN2aqirm0RMPi-Dp3lQa23fRP-NLWa9aa4eNl8';

        $response = Http::withToken($token)->withHeaders([
            'mc-number' => 'test',
            'dot_number' => 'test',
            'carrier-email' => 'test',
        ])->get($url . '/api/v2/mc-loads');

        $loads = $response->collect()->all()['data'];

        $clients = [];

        foreach($loads as $load) {
            $clients[$load['client']['id']] = $load['client'];
        }

        dd($clients);

    }
}
