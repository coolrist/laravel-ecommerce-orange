@extends('public.layout.main')

@section('title', __('common.checkout.title'))

@section('content')
    <!-- Checkout -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="font-weight-bold">{{ __('common.checkout.content.0') }}</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            {{ Form::open([
                'route' => 'placeorder',
                'id' => 'checkout-form',
                'method' => 'POST',
            ]) }}
            @csrf

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group checkout-small-element">
                {{ Form::label('', __('common.checkout.content.1')) }}
                <p class="form-control" id="checkout-name">{{ Session::get('user')->name }}</p>
            </div>
            <div class="form-group checkout-small-element">
                {{ Form::label('', __('common.checkout.content.2')) }}
                <p class="form-control" id="checkout-email">{{ Session::get('user')->email }}</p>
            </div>
            <div class="form-group checkout-small-element">
                {{ Form::label('', __('common.checkout.content.3')) }}
                <p class="form-control" id="checkout-phone">{{ Session::get('user')->phone }}</p>
            </div>
            <div class="form-group checkout-small-element">
                @php($label = __('common.checkout.content.4'))
                @php($name = 'city')
                {{ Form::label('', $label) }}
                {{ Form::text($name, old($name), ['placeholder' => $label, 'class' => 'form-control', 'id' => 'checkout-city']) }}
            </div>
            <div class="form-group checkout-large-element">
                @php($label = __('common.checkout.content.5'))
                @php($name = 'address')
                {{ Form::label('', $label) }}
                {{ Form::text($name, old($name), ['placeholder' => $label, 'class' => 'form-control', 'id' => 'checkout-address']) }}
            </div>
            <div class="form-group checkout-btn-container">
                <p>{{ __('common.checkout.content.6') }} $ {{ $cart->totalPrice }}</p>
                {{ Form::submit(__('common.checkout.content.7'), ['class' => 'btn', 'id' => 'checkout-btn']) }}
            </div>
            {{ Form::close() }}
        </div>
    </section>
@endsection
