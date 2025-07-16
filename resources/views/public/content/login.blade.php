@extends('public.layout.main')

@section('title', __('common.login.title'))

@section('content')
    <!-- Login -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="font-weight-bold">{{ __('common.login.content.0') }}</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="login-form" action="{{ route('user.accessaccount') }}" method="post">
                @csrf
                @if (Session::has('fail_status'))
                    <p class="text-center alert alert-danger">{{ Session::get('fail_status') }}</p>
                @elseif ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="">{{ __('common.login.content.1') }}</label>
                    <input type="email" class="form-control" id="login-email" name="email"
                        placeholder="{{ __('common.login.content.1') }}" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="">{{ __('common.login.content.2') }}</label>
                    <input type="password" class="form-control" id="login-password" name="password"
                        placeholder="{{ __('common.login.content.2') }}" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="login-btn" value="{{ __('common.login.content.3') }}">
                </div>
                <div class="form-group">
                    <a id="register-url" class="btn"
                        href="{{ route('register') }}">{{ __('common.login.content.4') }}</a>
                </div>
            </form>
        </div>
    </section>
@endsection
