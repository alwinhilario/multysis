@extends('home')

@section('homeSection')
<div class="container-fluid p-0">

    <div class="card">
        <div class="card-header">
            <span class="h3">Products</span>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>Name</th>
                    <th>Available Stocks</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)

                    <!-- Modal -->
                    @include('modal.order_modal', [
                    'object' => $product
                    ])

                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->available_stock }}</td>
                        <td class="text-center">
                            <a href="#{{ $product->id }}">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-{{ $product->id }}">
                                    Order
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $products->links("pagination::bootstrap-4") }}
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        // Append Modal
        let id = window.location.hash.split('')[1];
        if (id.length > 0) $(`#modal-${id}`).modal('toggle');
    })
</script>
@endsection