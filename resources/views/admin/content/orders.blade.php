@extends('admin.layout.main')

@section('title', __('admin.orders.title'))

@section('content')

    <!-- Header -->
    <header class="w3-container mt-5">
        <h1><i class="fa-solid fa-chart-line"></i>  {{ __('admin.orders.content.0') }}</h1>
    </header>

    <main class="w3-container">
        <h2 class="my-3">{{ __('admin.orders.content.1') }}</h2>

        @if (Session::has('success_status'))
            <p class="mt-5 text-center alert alert-success">{{ Session::get('success_status') }}</p>
        @elseif (Session::has('fail_status'))
            <p class="mt-5 text-center alert alert-danger">{{ Session::get('fail_status') }}</p>
        @endif

        <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
            <thead>
                <tr>
                    <th scope="col">{{ __('admin.orders.content.2') }}</th>
                    <th scope="col">{{ __('admin.orders.content.3') }}</th>
                    <th scope="col">{{ __('admin.orders.content.4') }}</th>
                    <th scope="col">{{ __('admin.orders.content.5') }}</th>
                    <th scope="col">{{ __('admin.orders.content.6') }}</th>
                    <th scope="col">{{ __('admin.orders.content.7') }}</th>
                    <th scope="col">{{ __('admin.orders.content.8') }}</th>
                    <th scope="col">{{ __('admin.orders.content.9') }}</th>
                    <th scope="col">{{ __('admin.orders.content.10') }}</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ Str::title($order->status->name) }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->user->phone }}</td>
                        <td>
                            @foreach (json_decode($order->address, true) as $key => $value)
                                <p><b>{{ Str::title($key) }}:</b> {{ $value }}</p>
                            @endforeach
                        </td>
                        <td>${{ $order->cost }}</td>
                        <td><a class="btn btn-primary" href="{{ route('orders.edit', ['order' => $order]) }}">
                                {{ __('admin.orders.content.9') }}</a></td>
                        <td><a class="btn btn-danger" href="{{ route('orders.destroy', ['order' => $order]) }}">
                                {{ __('admin.orders.content.10') }}</a></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col">{{ __('admin.orders.content.2') }}</th>
                    <th scope="col">{{ __('admin.orders.content.3') }}</th>
                    <th scope="col">{{ __('admin.orders.content.4') }}</th>
                    <th scope="col">{{ __('admin.orders.content.5') }}</th>
                    <th scope="col">{{ __('admin.orders.content.6') }}</th>
                    <th scope="col">{{ __('admin.orders.content.7') }}</th>
                    <th scope="col">{{ __('admin.orders.content.8') }}</th>
                    <th scope="col">{{ __('admin.orders.content.9') }}</th>
                    <th scope="col">{{ __('admin.orders.content.10') }}</th>
                </tr>
            </tfoot>
        </table>

        {{ $orders->links('pagination::bootstrap-4') }}

    </main>
@endsection
