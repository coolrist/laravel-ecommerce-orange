@extends('admin.layout.main')

@section('title', __('admin.addproduct.title'))

@section('content')
    <!-- Header -->
    <header class="w3-container mt-5">
        <h1><i class="fa-solid fa-chart-line"></i>  {{ __('admin.addproduct.content.0') }}</h1>
    </header>

    <main class="w3-container">
        <h2 class="my-3">{{ __('admin.addproduct.content.1') }}</h2>

        <div class="table-responsive">
            {{-- <div class="mx-auto container">
                {!! Form::open([
                    'route' => 'products.store',
                    'method' => 'POST',
                    'files' => true
                ]) !!}
                @csrf
                @if (Session::has('success_status'))
                    <div class="alert alert-success">
                        {{ Session::get('success_status') }}
                    </div>
                @elseif (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group my-2">
                    @php($label = __('admin.addproduct.content.2'))
                    @php($name = 'name')
                    {{ Form::label('', $label) }}
                    {{ Form::text($name, old($name), ['placeholder' => $label, 'class' => 'form-control', 'id' => 'product-name']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.addproduct.content.3'))
                    @php($name = 'description')
                    {{ Form::label('', $label) }}
                    {{ Form::textarea($name, old($name), ['placeholder' => $label, 'class' => 'form-control', 'id' => 'product-description']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.addproduct.content.4'))
                    @php($name = 'price')
                    {{ Form::label('', $label) }}
                    {{ Form::text($name, old($name), ['placeholder' => $label, 'class' => 'form-control', 'id' => 'product-price']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.addproduct.content.5'))
                    @php($name = 'category')
                    {{ Form::label('', $label) }}
                    {{ Form::select($name, $categories, old($name), ['placeholder' => $label, 'class' => 'form-select']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.addproduct.content.6'))
                    @php($name = 'color')
                    {{ Form::label('', $label) }}
                    {{ Form::text($name, old($name), ['placeholder' => $label, 'class' => 'form-control', 'id' => 'product-color']) }}
                </div>
                <div class="form-group my-2">
                    @php($name = 'special_offer')
                    {{ Form::label('', __('admin.addproduct.content.7')) }}
                    {{ Form::text($name, old($name), ['placeholder' => __('admin.addproduct.content.8'), 'class' => 'form-control', 'id' => 'product-special-offer']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.addproduct.content.9'))
                    {{ Form::label('', $label) }}
                    {{ Form::file('image1', ['placeholder' => $label, 'class' => 'form-control', 'id' => ' image1']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.addproduct.content.10'))
                    {{ Form::label('', $label) }}
                    {{ Form::file('image2', ['placeholder' => $label, 'class' => 'form-control', 'id' => ' image2']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.addproduct.content.11'))
                    {{ Form::label('', $label) }}
                    {{ Form::file('image3', ['placeholder' => $label, 'class' => 'form-control', 'id' => ' image3']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.addproduct.content.12'))
                    {{ Form::label('', $label) }}
                    {{ Form::file('image4', ['placeholder' => $label, 'class' => 'form-control', 'id' => ' image4']) }}
                </div>
                <div class="form-group my-2">
                    {{ Form::submit(__('admin.addproduct.content.13'), ['class' => 'btn btn-primary']) }}
                </div>
                {!! Form::close() !!}
            </div> --}}
            <div class="mx-auto container">
                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (Session::has('success_status'))
                        <div class="alert alert-success">
                            {{ Session::get('success_status') }}
                        </div>
                    @elseif (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group my-2">
                        @php($label = __('admin.addproduct.content.2'))
                        @php($name = 'name')
                        <label for="">{{ $label }}</label>
                        <input type="text" name="{{ $name }}" id="product-name" class="form-control"
                            placeholder="{{ $label }}" value="{{ old($name) }}">
                    </div>
                    <div class="form-group my-2">
                        @php($label = __('admin.addproduct.content.3'))
                        @php($name = 'description')
                        <label for="">{{ $label }}</label>
                        <textarea name="{{ $name }}" id="product-description" class="form-control" placeholder="{{ $label }}">
                            {{ old($name) }}</textarea>
                    </div>
                    <div class="form-group my-2">
                        @php($label = __('admin.addproduct.content.4'))
                        @php($name = 'price')
                        <label for="">{{ $label }}</label>
                        <input type="text" name="{{ $name }}" id="product-price" class="form-control"
                            placeholder="{{ $label }}" value="{{ old($name) }}">
                    </div>
                    <div class="form-group my-2">
                        @php($label = __('admin.addproduct.content.5'))
                        @php($name = 'category')
                        <label for="">{{ $label }}</label>
                        {{ Form::select($name, $categories, old($name), ['placeholder' => $label, 'class' => 'form-select']) }}
                    </div>
                    <div class="form-group my-2">
                        @php($label = __('admin.addproduct.content.6'))
                        @php($name = 'color')
                        <label for="">{{ $label }}</label>
                        <input type="color" name="{{ $name }}" id="product-color" class="form-control"
                            value="{{ old($name) }}">
                    </div>
                    <div class="form-group my-2">
                        @php($name = 'special_offer')
                        <label for="">{{ __('admin.addproduct.content.7') }}</label>
                        <input type="text" name="{{ $name }}" id="product-special-offer" class="form-control"
                            placeholder="{{ __('admin.addproduct.content.8') }}" value="{{ old($name) }}">
                    </div>
                    {{-- <div class="form-group my-2">
                        @php($label = __('admin.addproduct.content.9'))
                        <label for="">{{ $label }}</label>
                        {{ Form::file('image1', ['placeholder' => $label, 'class' => 'form-control', 'id' => ' image1']) }}
                    </div>
                    <div class="form-group my-2">
                        @php($label = __('admin.addproduct.content.10'))
                        <label for="">{{ $label }}</label>
                        {{ Form::file('image2', ['placeholder' => $label, 'class' => 'form-control', 'id' => ' image2']) }}
                    </div>
                    <div class="form-group my-2">
                        @php($label = __('admin.addproduct.content.11'))
                        <label for="">{{ $label }}</label>
                        {{ Form::file('image3', ['placeholder' => $label, 'class' => 'form-control', 'id' => ' image3']) }}
                    </div> --}}
                    <div class="form-group my-2">
                        @php($label = __('admin.addproduct.content.12'))
                        {{-- <input type="file" name="" id=""> --}}
                        <label for="">{{ $label }} </label>
                        <input type="image" name="image4" id="image4" class="form-control"
                            placeholder="{{ $label }}" src="" alt="">
                    </div>
                    <div class="form-group my-2">
                        <input type="submit" class="btn btn-primary" value="{{ __('admin.addproduct.content.13') }}">
                    </div>
                </form>
                {!! Form::open([
                    'route' => 'products.store',
                    'method' => 'POST',
                    'files' => true,
                ]) !!}
                @csrf
                @if (Session::has('success_status'))
                    <div class="alert alert-success">
                        {{ Session::get('success_status') }}
                    </div>
                @elseif (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group my-2">
                    @php($label = __('admin.addproduct.content.2'))
                    @php($name = 'name')
                    {{ Form::label('', $label) }}
                    {{ Form::text($name, old($name), ['placeholder' => $label, 'class' => 'form-control', 'id' => 'product-name']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.addproduct.content.3'))
                    @php($name = 'description')
                    {{ Form::label('', $label) }}
                    {{ Form::textarea($name, old($name), ['placeholder' => $label, 'class' => 'form-control', 'id' => 'product-description']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.addproduct.content.4'))
                    @php($name = 'price')
                    {{ Form::label('', $label) }}
                    {{ Form::text($name, old($name), ['placeholder' => $label, 'class' => 'form-control', 'id' => 'product-price']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.addproduct.content.5'))
                    @php($name = 'category')
                    {{ Form::label('', $label) }}
                    {{ Form::select($name, $categories, old($name), ['placeholder' => $label, 'class' => 'form-select']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.addproduct.content.6'))
                    @php($name = 'color')
                    {{ Form::label('', $label) }}
                    {{ Form::text($name, old($name), ['placeholder' => $label, 'class' => 'form-control', 'id' => 'product-color']) }}
                </div>
                <div class="form-group my-2">
                    @php($name = 'special_offer')
                    {{ Form::label('', __('admin.addproduct.content.7')) }}
                    {{ Form::text($name, old($name), ['placeholder' => __('admin.addproduct.content.8'), 'class' => 'form-control', 'id' => 'product-special-offer']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.addproduct.content.9'))
                    {{ Form::label('', $label) }}
                    {{ Form::file('image1', ['placeholder' => $label, 'class' => 'form-control', 'id' => ' image1']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.addproduct.content.10'))
                    {{ Form::label('', $label) }}
                    {{ Form::file('image2', ['placeholder' => $label, 'class' => 'form-control', 'id' => ' image2']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.addproduct.content.11'))
                    {{ Form::label('', $label) }}
                    {{ Form::file('image3', ['placeholder' => $label, 'class' => 'form-control', 'id' => ' image3']) }}
                </div>
                <div class="form-group my-2">
                    @php($label = __('admin.addproduct.content.12'))
                    {{ Form::label('', $label) }}
                    {{ Form::file('image4', ['placeholder' => $label, 'class' => 'form-control', 'id' => ' image4']) }}
                </div>
                <div class="form-group my-2">
                    {{ Form::submit(__('admin.addproduct.content.13'), ['class' => 'btn btn-primary']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </main>

@endsection
