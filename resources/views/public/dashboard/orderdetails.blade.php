@php
    use Illuminate\Support\Facades\Storage;
@endphp

@extends('public.layout.main')

@section('title', __('userdash.orderdetails.title'))

@section('content')
    <!--Order details -->
    <section id="orders" class="orders container my-5 py-3">
        <div class="container mt-5">
            <h2 class="font-weight-bold text-center">{{ __('userdash.orderdetails.content.0') }}</h2>
            <hr class="mx-auto">
        </div>

        <table class="mt-5 pt-5">
            <thead>
                <tr>
                    <th scope="col">{{ __('userdash.orderdetails.content.1') }}</th>
                    <th scope="col">{{ __('userdash.orderdetails.content.2') }}</th>
                    <th scope="col">{{ __('userdash.orderdetails.content.3') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->products as $product)
                    <tr>
                        <td>
                            <div class="product-info">
                                <img src="{{ Storage::url($product->image1) }}" alt="">
                                <p class="mt-3">{{ $product->name }}</p>
                            </div>
                        </td>
                        <td><span>$ {{ $product->price }}</span></td>
                        <td><span>{{ $product->pivot->quantity }}</span></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col">{{ __('userdash.orderdetails.content.1') }}</th>
                    <th scope="col">{{ __('userdash.orderdetails.content.2') }}</th>
                    <th scope="col">{{ __('userdash.orderdetails.content.3') }}</th>
                </tr>
            </tfoot>
        </table>

        @if ($order->status->id == 1)
            <div class="my-3">
                <a class="btn btn-primary" style="float: right;" href="{{ route('user.payment', ['order' => $order]) }}">{{ __('userdash.orderdetails.content.4') }}</a>
            </div>
        @endif

        {{-- if ($order_status == "not paid")
    <form action="payment.php" method="post">
        @csrf
        <input type="hidden" name="order_id" value="< ? = $order_id ?>">
        <input type="hidden" name="order_total_price" value="< ? = $order_total_price ?>">
        <input type="hidden" name="order_status" value="< ? = $order_status ?>">
        <input type="submit" name="order_pay_btn" value="">
    </form> --}}

    </section>
@endsection
