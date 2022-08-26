<?php

namespace App\Actions;

use App\Services\MakeRequestToApiService;
use Lorisleiva\Actions\Concerns\AsAction;

class Product
{
    use AsAction;

    public function __construct(protected MakeRequestToApiService $makeRequestToApiService)
    {
    }

    public function handle()
    {
        $data = $this->makeRequestToApiService->getProducts();
        if (!empty($data['error'])) {
           $data = $this->makeRequestToApiService->getProducts();
        }
        return $data;
    }

    public function asController()
    {
        return $this->handle();
    }

    public function htmlResponse(array $data)
    {
        return view('product-list', ['product' => $data]);
    }

}
