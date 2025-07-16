@extends('public.layout.main')

@section('title', __('common.register.title'))

@section('content')
    <!-- Register -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="font-weight-bold">{{ __('common.register.content.0') }}</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="register-form" action="{{ route('user.create') }}" method="post">
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
                    @php($label = __('common.register.content.1'))
                    @php($name = 'name')
                    <label for="">{{ $label }}</label>
                    <input type="text" class="form-control" id="register-name" name="{{ $name }}"
                        placeholder="{{ $label }}" value="{{ old($name) }}" required>
                </div>
                <div class="form-group">
                    @php($label = __('common.register.content.2'))
                    @php($name = 'email')
                    <label for="">{{ $label }}</label>
                    <input type="email" class="form-control" id="register-email" name="{{ $name }}"
                        placeholder="{{ $label }}" value="{{ old($name) }}" required>
                </div>
                <div class="form-group">
                    @php($label = __('common.register.content.3'))
                    @php($name = 'phone')
                    <label for="">{{ $label }}</label>
                    <input type="tel" class="form-control" id="register-phone" name="{{ $name }}"
                        placeholder="{{ $label }}" value="{{ old($name) }}" required>
                </div>
                <div class="form-group">
                    @php($label = __('common.register.content.4'))
                    <label for="">{{ $label }}</label>
                    <input type="password" class="form-control" id="register-password" name="password"
                        placeholder="{{ $label }}" required>
                </div>
                <div class="form-group">
                    @php($label = __('common.register.content.5'))
                    <label for="">{{ $label }}</label>
                    <input type="password" class="form-control" id="register-confirm-password" name="confirmPassword"
                        placeholder="{{ $label }}" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="register-btn" value="{{ __('common.register.content.6') }}">
                </div>
                <div class="form-group">
                    <a id="login-url" class="btn" href="{{ route('login') }}">{{ __('common.register.content.7') }}</a>
                </div>
            </form>
        </div>
    </section>
@endsection
