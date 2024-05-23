<?php

namespace App\Services;

use Illuminate\Http\Client\{ConnectionException,PendingRequest,RequestException};
use Illuminate\Support\Facades\{Http,Log};

class NewtralTestService
{
    private PendingRequest $client;
    private string $base_url;

    public function __construct()
    {
        $this->client = Http::withToken(config('services.newtral.token'))->withHeaders($this->getHeaders());
        $this->base_url = config('services.newtral.host');
    }

    /**
     * Gets the headers for the Newtral request
     * @return string[]
     */
    private function getHeaders (): array
    {
        return [
            'mc-number' => 'test',
            'dot_number' => 'test',
            'carrier-email' => 'test',
        ];
    }

    /**
     * Gets the loads from the Newtral API
     *
     * @throws RequestException
     * @throws ConnectionException
     * @throws \JsonException
     */
    final public function getLoads(): array
    {
        $response = $this->client->get($this->base_url . '/api/v2/mc-loads');
        $response->throw();

        return $this->successfulResponse($response->collect()->all());
    }

    /**
     * Returns the successful response or an empty array if not successful
     */
    private function successfulResponse(array $data): array
    {
        if (empty($data) || $data['status'] !== 'success') {
            Log::debug('Error getting data from Newtral: ' . json_encode( $data['status'], JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT ) );
            return [];
        }

        return $data['data'] ?? [];
    }
}
