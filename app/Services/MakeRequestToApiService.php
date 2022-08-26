<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MakeRequestToApiService
{
    public function __construct(
        protected string $baseUrl,
        protected null|int $retryTimes = null,
        protected null|int $retryMilliseconds = null,
    )
    {
    }

    public function getProducts()
    {
        try {
            $response = Http::timeout(10)
                ->retry(
                    $this->retryTimes,
                    $this->retryMilliseconds
                )
                ->get($this->baseUrl . '/list');

            if (! $response->successful()) {
                return $response->toException();
            }

            return $response->json();
        }
        catch (Exception $exception)
        {
            Log::error($exception);
        }

    }

    public function getProductDetail($slug = null)
    {
        try {
            return Http::retry(
                $this->retryTimes,
                $this->retryMilliseconds,
                throw: false
            )->get($this->baseUrl . "/info", ['id' => $slug])->json();
        }
        catch (Exception $exception) {
            Log::error($exception);

        }

    }
}
