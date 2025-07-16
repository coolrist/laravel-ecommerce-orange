@extends('admin.layout.main')

@section('title', __('admin.editproduct.title'))

@section('content')

    <!-- Header -->
    <header class="w3-container mt-5">
        <h1><i class="fa-solid fa-chart-line"></i>  {{ __('admin.editproduct.content.0') }}</h1>
    </header>

    <main class="w3-container">
        <h2 class="my-3">{{ __('admin.editproduct.content.1') }}</h2>

        <div class="table-responsive">
            <div class="mx-auto container">
                {{ Form::open([
                    'route' => ['products.update', $product],
                    'id' => 'edit-form',
                    'method' => 'PUT',
                    'files' => true,
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

                <div class="form-group my-2">
                    @php($label = __('admin.editproduct.content.2'))
                    @php($name = 'name')
                    {{ Form::label('', $label) }}
                    {{ Form::text($name, $product->name, ['placeholder' => $label, 'class' => 'form-control', 'id' => 'product-name']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.editproduct.content.3'))
                    @php($name = 'description')
                    {{ Form::label('', $label) }}
                    {{ Form::textarea($name, $product->description, ['placeholder' => $label, 'class' => 'form-control', 'id' => 'product-description']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.editproduct.content.4'))
                    @php($name = 'price')
                    {{ Form::label('', $label) }}
                    {{ Form::text($name, $product->price, ['placeholder' => $label, 'class' => 'form-control', 'id' => 'product-price']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.editproduct.content.5'))
                    @php($name = 'category')
                    {{ Form::label('', $label) }}
                    {{ Form::select($name, $categories, $product->category->id, ['class' => 'form-select']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.editproduct.content.6'))
                    @php($name = 'color')
                    {{ Form::label('', $label) }}
                    {{ Form::text($name, $product->color, ['placeholder' => $label, 'class' => 'form-control', 'id' => 'product-color']) }}
                </div>
                <div class="form-group my-2">
                    @php($name = 'special_offer')
                    {{ Form::label('', __('admin.editproduct.content.7')) }}
                    {{ Form::text($name, $product->special_offer, ['placeholder' => __('admin.editproduct.content.8'), 'class' => 'form-control', 'id' => 'product-special-offer']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.editproduct.content.9'))
                    {{ Form::label('', $label) }}
                    {{ Form::file('image1', ['placeholder' => $label, 'class' => 'form-control', 'id' => ' image1']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.editproduct.content.10'))
                    {{ Form::label('', $label) }}
                    {{ Form::file('image2', ['placeholder' => $label, 'class' => 'form-control', 'id' => ' image2']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.editproduct.content.11'))
                    {{ Form::label('', $label) }}
                    {{ Form::file('image3', ['placeholder' => $label, 'class' => 'form-control', 'id' => ' image3']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.editproduct.content.12'))
                    {{ Form::label('', $label) }}
                    {{ Form::file('image4', ['placeholder' => $label, 'class' => 'form-control', 'id' => ' image4']) }}
                </div>
                <div class="form-group my-2">
                    {{ Form::submit(__('admin.editproduct.content.13'), ['class' => 'btn btn-primary']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </main>
@endsection
