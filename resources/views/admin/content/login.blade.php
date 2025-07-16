@extends('admin.layout.main')

@section('title', __('admin.login.title'))

@section('content')

    <!-- Login -->
    <div class="my-5 py-5">
        <header class="container text-center">
            <h2 class="font-weight-bold">{{ __('admin.login.content.0') }}</h2>
            <hr class="mx-auto">
        </header>
        <main class="mx-auto container text-center">
            <form id="login-form" action="{{ route('admin.accessaccount') }}" method="post">
                @csrf
                @if (Session::has('fail_status'))
                    <p class="text-center alert alert-danger">{{ Session::get('fail_status') }}</p>
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
                    @php
                        $label = __('admin.login.content.1');
                        $id = 'login-email';
                    @endphp
                    <label for="{{ $id }}">{{ $label }}</label>
                    <input type="email" class="form-control" id="{{ $id }}" name="email"
                        placeholder="{{ $label }}" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    @php
                        $label = __('admin.login.content.2');
                        $id = 'login-password';
                    @endphp
                    <label for="{{ $id }}">{{ $label }}</label>
                    <input type="password" class="form-control" id="{{ $id }}" name="password"
                        placeholder="{{ $label }}" required>
                </div>
                <div class="form-group mt-1">
                    <input type="submit" class="btn btn-primary" id="login-btn" value="{{ __('admin.login.content.3') }}"
                        name="login_btn">
                </div>
            </form>
        </main>
    </div>

@endsection
