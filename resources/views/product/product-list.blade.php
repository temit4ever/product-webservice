<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
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
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($product['products'] as $key => $product)
                            <tr>
                                <td>{{ $product }}</td>
                                <td class="btn btn-info"
                                    data-bs-toggle="modal"
                                    data-bs-target="#viewModal-{{$key}}"
                                    onclick="details('{{$key}}', event);">
                                    View
                                </td>
                                @include('product.view-product', ['key' => $key])
                            </tr>
                        @empty
                            <td><p>No product</p></td>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    details = (key, event) => {
        event.preventDefault();
        axios.get(`product/details/${key}`).then(
            function (response) {
                const wraper = document.querySelectorAll(`#modal-body-${key}`);
                wraper.forEach(element => {
                    element.innerHTML = `<div><strong>Name:</strong> ${response.data.name}</div><hr />`
                    element.innerHTML += `<div><strong>Description:</strong> ${response.data.description}</div><hr />`
                    element.innerHTML += `<div><strong>Type:</strong> ${response.data.type}</div><hr />`
                    element.innerHTML += `<div><strong>Supplier(s):</strong> ${response.data.suppliers}</div>`
                });
            }
        )
    }
</script>
