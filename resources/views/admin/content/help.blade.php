@extends('admin.layout.main')

@section('title', __('admin.help.title'))

@section('content')
     <!-- Header -->
     <header class="w3-container mt-5">
        <h1><i class="fa-solid fa-chart-line"></i>  {{ __('admin.help.content.0') }}</h1>
    </header>

    <main class="w3-container">
        <h2 class="my-3">{{ __('admin.help.content.1') }}</h2>
        <p>{{ __('admin.help.content.2') }} <a href="mailto:admin@email.com">admin@email.com</a></p>
        <p>{{ __('admin.help.content.3') }} <a href="tel:+228-123-456-789">+228 123-456-789</a></p>
    </main>
@endsection