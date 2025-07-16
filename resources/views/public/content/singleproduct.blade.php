@php
    use Illuminate\Support\Facades\Storage;
@endphp

@extends('public.layout.main')

@section('title', __('common.singleproduct.title', ['Product' => $product->name]))

@section('content')

    <!-- Single product -->
    <section class="container single-product my-5 pt-5">
        <div class="row mt-5">

            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" id="mainImg" src="{{ Storage::url($product->image1) }}" alt="">
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img class="small-img" src="{{ Storage::url($product->image1) }}" alt="">
                    </div>
                    <div class="small-img-col">
                        <img class="small-img" src="{{ Storage::url($product->image2) }}" alt="">
                    </div>
                    <div class="small-img-col">
                        <img class="small-img" src="{{ Storage::url($product->image3) }}" alt="">
                    </div>
                    <div class="small-img-col">
                        <img class="small-img" src="{{ Storage::url($product->image4) }}" alt="">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <h6>{{ Str::title($product->category->name) }}</h6>
                <h3 class="py-4">{{ $product->name }}</h3>
                <h2>$ {{ $product->price }}</h2>

                <form action="{{ route('cart.add') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="number" name="quantity" value="1">
                    <button class="buy-btn" type="submit">{{ __('common.singleproduct.content.btn.add') }}</button>
                </form>

                <h4 class="mt-5 mb-5">{{ __('common.singleproduct.content.others.0') }}</h4>
                <p>{{ Str::of($product->description)->toHtmlString() }}</p>
            </div>

        </div>
    </section>

    <!-- Related products -->
    <section id="related-products" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>{{ __('common.singleproduct.content.others.1') }}</h3>
            <hr class="mx-auto">
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
                        <button class="buy-btn">{{ __('common.singleproduct.content.btn.buy') }}</button></a>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@section('js')
    <script>
        var mainImg = document.querySelector("#mainImg");
        var smallImg = document.querySelectorAll(".small-img");

        for (const key in smallImg) {
            smallImg[key].onclick = () => mainImg.src = smallImg[key].src;
            console.log(smallImg[key].src);
        }
        console.log(mainImg.src);
        console.log(smallImg);
        console.log("fuck you");
    </script>
@endsection
