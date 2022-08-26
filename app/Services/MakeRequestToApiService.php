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

    /**
     * Get the product list from the webservice
     *
     * @return array|\Illuminate\Http\Client\RequestException|mixed|void|null
     */
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

    /**
     * Get a specific product details from the webservice
     *
     * @param $slug
     * @return array|mixed|void
     */
    public function getProductDetail($slug = null)
    {
        try {
            return Http::retry(
                $this->retryTimes,
                $this->retryMilliseconds,
            )->get($this->baseUrl . "/info", ['id' => $slug])->json();
        }
        catch (Exception $exception) {
            Log::error($exception);

        }

    }
}
