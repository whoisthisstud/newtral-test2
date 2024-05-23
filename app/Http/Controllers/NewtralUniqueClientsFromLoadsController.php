<?php

namespace App\Http\Controllers;

use App\Services\NewtralTestService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NewtralUniqueClientsFromLoadsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try {
            $loads = $request->loads ?? (new NewtralTestService())->getLoads();
        }
        catch ( Exception $e ) {
            Log::warning('Error getting data from Newtral: ' . $e->getMessage());
            return;
        }

        $clients = [];

        foreach($loads as $load) {
            // Use the client ID as the key for uniqueness
            $clients[$load['client']['id']] = $load['client'];
        }

        dd($clients);

//        return $clients;

    }
}
