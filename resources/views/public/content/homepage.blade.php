@php
    use App\Models\Product;
    use Illuminate\Support\Facades\Storage;
    use App\Lib\StrFun;
@endphp

@extends('public.layout.main')

@section('title', __('common.homepage.title'))

@section('content')
    <!-- Home -->
    <section id="home" {{ StrFun::backgroundImage('assets/public/img/back.jpg') }}>
        <div class="container">
            <h5>{{ __('common.homepage.content.others.0') }}</h5>
            <h1><span>{{ __('common.homepage.content.others.1') }}</span> {{ __('common.homepage.content.others.2') }}</h1>
            <p>{{ __('common.homepage.content.others.3') }}</p>
            <button>{{ __('common.homepage.content.btn.shop') }}</button>
        </div>
    </section>

    <!-- Brand -->
    <section id="brand" class="container">
        <div class="row m-0">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" alt="" src="/assets/public/img/brand1.png">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" alt="" src="/assets/public/img/brand2.png">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" alt="" src="/assets/public/img/brand3.png">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" alt="" src="/assets/public/img/brand4.png">
        </div>
    </section>

    <!-- New -->
    <section id="new" class="w-100">
        <div class="row m-0 p-0">
            <!-- One -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" alt="" src="/assets/public/img/1.jpg">
                <div class="details">
                    <h2>{{ __('common.homepage.content.others.4') }}</h2>
                    <button class="text-uppercase">{{ __('common.homepage.content.btn.shop') }}</button>
                </div>
            </div>

            <!-- Two -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" alt="" src="/assets/public/img/2.jpg">
                <div class="details">
                    <h2>{{ __('common.homepage.content.others.5') }}</h2>
                    <button class="text-uppercase">{{ __('common.homepage.content.btn.shop') }}</button>
                </div>
            </div>

            <!-- Three -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" alt="" src="/assets/public/img/3.jpg">
                <div class="details">
                    <h2>{{ __('common.homepage.content.others.6') }}</h2>
                    <button class="text-uppercase">{{ __('common.homepage.content.btn.shop') }}</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured -->
    <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>{{ __('common.homepage.content.others.7') }}</h3>
            <hr class="mx-auto">
            <p>{{ __('common.homepage.content.others.8') }}</p>
        </div>

        <div class="row mx-auto container-fluid">
            @foreach ($featured as $product)
                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" alt="" src="{{ Storage::url($product->image1) }}">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h5 class="p-name">{{ $product->name }}</h5>
                    <h4 class="p-price">$ {{ $product->price }}</h4>
                    <a href="{{ route('singleproduct', ['product' => $product->id]) }}">
                        <button class="buy-btn">{{ __('common.homepage.content.btn.buy') }}</button></a>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Banner -->
    <section id="banner" class="my-5 py-5" {{ StrFun::backgroundImage('assets/public/img/banner.jpg') }}>
        <div class="container">
            <h4>{{ __('common.homepage.content.others.9') }}</h4>
            <h1>{{ __('common.homepage.content.others.10') }} <br> {{ __('common.homepage.content.others.11') }}</h1>
            <button class="text-uppercase">{{ __('common.homepage.content.btn.shop') }}</button>
        </div>
    </section>

    <!-- Clothes -->
    <section id="clothes" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>{{ __('common.homepage.content.others.12') }}</h3>
            <hr class="mx-auto">
            <p>{{ __('common.homepage.content.others.13') }}</p>
        </div>

        <div class="row mx-auto container-fluid">

            @foreach ($coats as $product)
                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" alt="" src="{{ Storage::url($product->image1) }}">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h5 class="p-name">{{ $product->name }}</h5>
                    <h4 class="p-price">$ {{ $product->price }}</h4>
                    <a href="{{ route('singleproduct', ['product' => $product->id]) }}">
                        <button class="buy-btn">{{ __('common.homepage.content.btn.buy') }}</button></a>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Watches -->
    <section id="watches" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>{{ __('common.homepage.content.others.14') }}</h3>
            <hr class="mx-auto">
            <p>{{ __('common.homepage.content.others.15') }}</p>
        </div>

        <div class="row mx-auto container-fluid">

            @foreach ($watches as $product)
                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" alt="" src="{{ Storage::url($product->image1) }}">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h5 class="p-name">{{ $product->name }}</h5>
                    <h4 class="p-price">$ {{ $product->price }}</h4>
                    <a href="{{ route('singleproduct', ['product' => $product->id]) }}">
                        <button class="buy-btn">{{ __('common.homepage.content.btn.buy') }}</button></a>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Shoes -->
    <section id="shoes" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>{{ __('common.homepage.content.others.16') }}</h3>
            <hr class="mx-auto">
            <p>{{ __('common.homepage.content.others.17') }}</p>
        </div>

        <div class="row mx-auto container-fluid">
            @foreach ($shoes as $product)
                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" alt="" src="{{ Storage::url($product->image1) }}">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h5 class="p-name">{{ $product->name }}</h5>
                    <h4 class="p-price">$ {{ $product->price }}</h4>
                    <a href="{{ route('singleproduct', ['product' => $product->id]) }}">
                        <button class="buy-btn">{{ __('common.homepage.content.btn.buy') }}</button></a>
                </div>
            @endforeach
        </div>
    </section>

@endsection
