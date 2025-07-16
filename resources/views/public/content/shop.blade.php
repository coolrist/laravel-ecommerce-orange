@php
    use Illuminate\Support\Facades\Storage;
@endphp

@extends('public.layout.main')

@section('title', __('common.shop.title'))

@section('content')

    <div class="row mx-auto container-fluid">
        <!-- Search -->
        <section id="search" class="my-5 py-5 ms-1 col-lg-3 col-md-3 col-sm-3">
            <div class="container mt-5 py-5">
                <p>{{ __('common.shop.content.0') }}</p>
                <hr>
            </div>

            <form action="/homepage/shop/" method="post">
                <div class="row mx-auto container">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p>{{ __('common.shop.content.1') }}</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" id="category_one" value="shoes"
                                <?= !isset($category) || $category == 'shoes' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="category_one">{{ __('common.shop.content.2') }}</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" id="category_two" value="coats"
                                <?= isset($category) && $category == 'coats' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="category_two">{{ __('common.shop.content.3') }}</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" id="category_three"
                                value="watches" <?= isset($category) && $category == 'watches' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="category_three">{{ __('common.shop.content.4') }}</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" id="category_four" value="bags"
                                <?= isset($category) && $category == 'bags' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="category_four">{{ __('common.shop.content.5') }}</label>
                        </div>
                    </div>
                </div>

                <div class="row mx-auto container mt-5">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p>{{ __('common.shop.content.6') }}</p>
                        <input class="form-range w-50" type="range" min="1" max="1000" name="price"
                            id="customRange2" value="<?= isset($_POST['price']) ? (int) $_POST['price'] : 500 ?>">
                        <div class="w-50">
                            <span style="float: left;">1</span>
                            <span style="float: right;">1000</span>
                        </div>
                    </div>
                </div>

                <div class="form-group my-3 mx-3">
                    <input class="btn btn-primary" type="submit" name="search" value="{{ __('common.shop.content.7') }}">
                </div>
            </form>

        </section>

        <!-- Shop -->
        <section id="shop" class="my-5 py-5 col-lg-8 col-md-8 col-sm-7">
            <div class="container mt-5 py-5">
                <h3>{{ __('common.shop.content.8') }}</h3>
                <hr>
                <p>{{ __('common.shop.content.9') }}</p>
            </div>

            <div class="row mx-auto container-fluid">

                @foreach ($products as $product)
                    <div onclick="window.location.href='{{ route('singleproduct', ['product' => $product]) }}';"
                        class="product text-center col-lg-3 col-md-4 col-sm-12">
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
                        <button class="buy-btn">{{ __('common.shop.content.10') }}</button>
                    </div>
                @endforeach

            </div>

            {{ $products->links('pagination::bootstrap-4') }}

        </section>
    </div>
@endsection
