@extends('admin.layout.main')

@section('title', __('admin.editcategory.title'))

@section('content')
    <!-- Header -->
    <header class="w3-container mt-5">
        <h1><i class="fa-solid fa-chart-line"></i>  {{ __('admin.editcategory.content.0') }}</h1>
    </header>

    <main class="w3-container">
        <h2 class="my-3">{{ __('admin.editcategory.content.1') }}</h2>

        <div class="table-responsive">
            <div class="mx-auto container">
                {!! Form::open([
                    'route' =>[ 'categories.update', $category],
                    'method' => 'PUT',
                ]) !!}
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

                <div class="form-group">
                    @php($label = __('admin.editcategory.content.2'))
                    @php($name = 'name')
                    {{ Form::label('', $label) }}
                    {{ Form::text($name, $category->name, ['placeholder' => $label, 'class' => 'form-control', 'id' => 'category-name']) }}
                </div>

                <div class="form-group my-2">
                    {{ Form::submit(__('admin.editcategory.content.3'), ['class' => 'btn btn-primary']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </main>

@endsection
