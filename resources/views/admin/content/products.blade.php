@php
   use Illuminate\Support\Facades\Storage;
@endphp

@extends('admin.layout.main')

@section('title', __('admin.products.title'))

@section('content')
    <!-- Header -->
    <header class="w3-container mt-5">
        <h1><i class="fa-solid fa-chart-line"></i>  {{ __('admin.products.content.0') }}</h1>
    </header>

    <main class="w3-container" id="product-dashboard">
        <h2 class="my-3">{{ __('admin.products.content.1') }}</h2>

        @if (Session::has('success_status'))
            <p class="mt-5 text-center alert alert-success">{{ Session::get('success_status') }}</p>
        @elseif (Session::has('fail_status'))
            <p class="mt-5 text-center alert alert-danger">{{ Session::get('fail_status') }}</p>
        @endif

        <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
            <thead>
                <tr>
                    <th scope="col">{{ __('admin.products.content.2') }}</th>
                    <th scope="col">{{ __('admin.products.content.3') }}</th>
                    <th scope="col">{{ __('admin.products.content.4') }}</th>
                    <th scope="col">{{ __('admin.products.content.5') }}</th>
                    <th scope="col">{{ __('admin.products.content.6') }}</th>
                    <th scope="col">{{ __('admin.products.content.7') }}</th>
                    <th scope="col">{{ __('admin.products.content.8') }}</th>
                    <th scope="col">{{ __('admin.products.content.9') }}</th>
                    <th scope="col">{{ __('admin.products.content.10') }}</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td><img src="{{ Storage::url($product->image1) }}" alt=""></td>
                        <td>{{ $product->name }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->special_offer }}%</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->color }}</td>
                        <td><a class="btn btn-primary"
                                href="{{ route('products.edit', ['product' => $product]) }}">Edit</a>
                        </td>
                        <td><a class="btn btn-danger"
                                href="{{ route('products.destroy', ['product' => $product]) }}">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col">{{ __('admin.products.content.2') }}</th>
                    <th scope="col">{{ __('admin.products.content.3') }}</th>
                    <th scope="col">{{ __('admin.products.content.4') }}</th>
                    <th scope="col">{{ __('admin.products.content.5') }}</th>
                    <th scope="col">{{ __('admin.products.content.6') }}</th>
                    <th scope="col">{{ __('admin.products.content.7') }}</th>
                    <th scope="col">{{ __('admin.products.content.8') }}</th>
                    <th scope="col">{{ __('admin.products.content.9') }}</th>
                    <th scope="col">{{ __('admin.products.content.10') }}</th>
                </tr>
            </tfoot>
        </table>

        {{ $products->links('pagination::bootstrap-4') }}

    </main>
@endsection
