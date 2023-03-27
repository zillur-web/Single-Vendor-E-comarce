@extends('frontend.header')
@section('content')
<!-- orders-area start -->
<div class="cart-area ptb-100">
    <div class="fluid-container">
        <div class="row">
            <div class="col-12">
                <table class="table-responsive cart-wrap" style="display: table;">
                    <thead>
                        <tr>
                            <th class="images">ID</th>
                            <th class="product">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $key => $order)
                            <tr>
                                <td class="images">{{ $order->id }}</td>
                                <td class="text-center">
                                    <a href="{{ route('customer.orders.invoice.download',$order->id) }}" class="btn btn-sm btn-info"><i class="fa fa-download"></i> Invoice</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="50">No orders to show</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- orders-area end -->

@endsection
