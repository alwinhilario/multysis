<div class="modal fade" id="modal-{{ $product->id }}" role="dialog">
    <form action="{{ route('orders.store', ['id' => $object->id]) }}" method="POST" autocomplete="off" novalidate>
        @csrf

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="h3">Order Product</span>
                </div>
                <div class="modal-body">
                    <!-- alwinhilario1594623780@gmail.com -->

                    @include('helpers.alerts.my_alert')

                    @include('forms.text', [
                    'label' => "$object->name (Available Stocks)",
                    'id' => 'available_stock',
                    'value' => $object->available_stock
                    ])
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary float-right">
                        Order
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>