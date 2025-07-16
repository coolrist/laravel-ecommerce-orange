@extends('public.layout.main')

@section('title', __('common.contact.title'))

@section('content')
    <!--Contact -->
    <section id="contact" class="container my-5 py-5">
        <div class="container text-center mt-5">
            <h3>{{ __('common.contact.content.0') }}</h3>
            <hr class="mx-auto">
            <p class="w-50 mx-auto">{{ __('common.contact.content.1') }} <span>123 456 7890</span></p>
            <p class="w-50 mx-auto">{{ __('common.contact.content.2') }} <span>info@email.com</span></p>
            <p class="w-50 mx-auto">{{ __('common.contact.content.3') }}</p>
        </div>
    </section>
@endsection
