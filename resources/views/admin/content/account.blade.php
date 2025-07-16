@extends('admin.layout.main')

@section('title', __('admin.account.title'))

@section('content')
    <!-- Header -->
    <header class="w3-container mt-5">
        <h1><i class="fa-solid fa-chart-line"></i>  {{ __('admin.account.content.0') }}</h1>
    </header>

    <main class="w3-container">
        <h2 class="my-3">{{ __('admin.account.content.1') }}</h2>
        <p>{{ __('admin.account.content.2') . ' ' . Session::get('admin')->name }}</p>
        <p>{{ __('admin.account.content.3') . ' ' . Session::get('admin')->email }}</p>
    </main>
@endsection
