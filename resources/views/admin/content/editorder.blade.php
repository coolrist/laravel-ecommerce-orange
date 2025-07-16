@extends('admin.layout.main')

@section('title', __('admin.editorder.title'))

@section('content')
    <!-- Header -->
    <header class="w3-container mt-5">
        <h1><i class="fa-solid fa-chart-line"></i>  {{ __('admin.editorder.content.0') }}</h1>
    </header>

    <main class="w3-container">
        <h2 class="my-3">{{ __('admin.editorder.content.1') }}</h2>

        <div class="table-responsive">
            <div class="mx-auto container">
                {{ Form::open([
                    'route' => ['orders.update', $order],
                    'method' => 'PUT',
                    'id' => 'edit-form',
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

                <div class="form-group my-4">
                    <label>{{ __('admin.editorder.content.2') }}</label>
                    <p class="form-control">{{ $order->id }}</p>
                </div>
                <div class="form-group my-4">
                    <label>{{ __('admin.editorder.content.3') }}</label>
                    <p class="form-control">{{ $order->cost }}</p>
                </div>
                <div class="form-group my-4">
                    <label>{{ __('admin.editorder.content.4') }}</label>
                    {{ Form::select('status', $statuses, '', ['class' => 'form-select', 'placeholder' => $order->status->name]) }}
                </div>
                <div class="form-group my-4">
                    <label>{{ __('admin.editorder.content.5') }}</label>
                    <p class="form-control">{{ date('d/m/Y H:i', strtotime($order->created_at)) }}</p>
                </div>
                <div class="form-group my-4">
                    {{ Form::submit(__('admin.editorder.content.6'), ['class' => 'btn btn-primary']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </main>
@endsection
