@extends('admin.layout.main')

@section('title', __('admin.addcategory.title'))

@section('content')
    <!-- Header -->
    <header class="w3-container mt-5">
        <h1><i class="fa-solid fa-chart-line"></i>  {{ __('admin.addcategory.content.0') }}</h1>
    </header>

    <main class="w3-container">
        <h2 class="my-3">{{ __('admin.addcategory.content.1') }}</h2>

        <div class="table-responsive">
            <div class="mx-auto container">
                {{ Form::open([
                    'route' => 'categories.store',
                    'method' => 'POST',
                ]) }}
                @csrf
                @if (Session::has('success_status'))
                    <div class="alert alert-success">
                        {{ Session::get('success_status') }}
                    </div>
                @elseif (Session::has('fail_status'))
                    <div class="alert alert-warning">
                        {{ Session::get('fail_status') }}
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

                <div class="form-group">
                    @php($label = __('admin.addcategory.content.2'))
                    @php($name = 'name')
                    {{ Form::label('', $label) }}
                    {{ Form::text($name, old($name), ['placeholder' => $label, 'class' => 'form-control', 'id' => 'category-name']) }}
                </div>

                <div class="form-group my-2">
                    {{ Form::submit(__('admin.addcategory.content.3'), ['class' => 'btn btn-primary']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </main>

@endsection
