<?php

namespace App\Actions;

use App\Services\MakeRequestToApiService;
use Lorisleiva\Actions\Concerns\AsAction;

class ProductDetail
{
    use AsAction;
    public function __construct(protected MakeRequestToApiService $makeRequestToApiService)
    {

    }
    public  function handle($slug)
    {
        $data = $this->makeRequestToApiService->getProductDetail($slug);
        if (!empty($data['error'])) {
            $data = $this->makeRequestToApiService->getProductDetail($slug);
        }
        return $data;
    }

    public function asController(string $slug)
    {
        return $this->handle($slug);
    }

    public function jsonResponse(array $data)
    {
        $data = new \App\Http\Resources\ProductDetail($data);
        return response()->json($data);
    }

}
