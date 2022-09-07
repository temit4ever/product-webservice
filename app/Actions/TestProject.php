<?php

namespace App\Actions;

use App\Http\Resources\UserOrderDataResource;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

use Lorisleiva\Actions\Concerns\AsAction;


class TestProject
{
    use AsAction;
    public function handle()
    {
        $users = User::withCount('orders' )->where('id', 2)
            ->get();
        return ['users' => $users];
    }

    public function asController()
    {
        return $this->handle();
    }

    public function htmlResponse($data)
    {
        return view('test.user',$data);
    }

}
