@extends('public.layout.main')

@section('title', __('common.cart.title'))

@section('content')

    <!-- Cart -->
    <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bold">{{ __('common.cart.content.others.0') }}</h2>
            <hr>
        </div>

        @if ($cart)
            <table class="mt-5 pt-5" aria-label="">
                <tr>
                    <th>{{ __('common.cart.content.others.1') }}</th>
                    <th>{{ __('common.cart.content.others.2') }}</th>
                    <th>{{ __('common.cart.content.others.3') }}</th>
                </tr>

                @foreach ($cart->items as $item)
                    <tr>
                        <td>
                            <div class="product-info">
                                <img src="{{ Storage::url($item['product']->image1) }}" alt="">
                                <div>
                                    <p>{{ $item['product']->name }}<br><small><span>$</span>{{ $item['cost'] }}</small>
                                    </p>
                                    <form action="{{ route('cart.remove') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item['product']->id }}">
                                        <input type="submit" class="remove-btn"
                                            value="{{ __('common.cart.content.others.5') }}">
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td>
                            <form action="{{ route('cart.update') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item['product']->id }}">
                                <input type="number" name="quantity" value="{{ $item['qty'] }}">
                                <input type="submit" class="edit-btn" value="{{ __('common.cart.content.others.4') }}">
                            </form>
                        </td>
                        <td>
                            <span>$</span>
                            <span class="product-price">{{ $item['qty'] * $item['cost'] }}</span>
                        </td>
                    </tr>
                @endforeach
            </table>

            <div class="cart-total">
                <table>
                    <tr>
                        <td>{{ __('common.cart.content.others.6') }}</td>
                        <td>{{ $cart->totalPrice > 0 ? "$ $cart->totalPrice" : '' }}</td>
                    </tr>
                </table>
            </div>

            <div class="checkout-container">
                <form action="{{ route('checkout') }}" method="post">
                    @csrf
                    <input type="submit" class="btn checkout-btn" value="{{ __('common.cart.content.others.7') }}">
                </form>
            </div>
        @endif
    </section>

@endsection
