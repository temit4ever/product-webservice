@php
//dd($users[0]->orders);
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>Insurance Products</strong>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="col">User Name</th>
                            <th scope="col">Order Details</th>
                            <th scope="col">Count</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>
                                    @foreach($user->orders as $order)
                                        Order Total: {{$order->order_total}}<br/>
                                        Delivery Type: {{$order->delivery_type}}<hr/>
                                    @endforeach
                                </td>
                                <td>{{$user->orders_count}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
