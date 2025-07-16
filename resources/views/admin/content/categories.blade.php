@extends('admin.layout.main')

@section('title', __('admin.categories.title'))

@section('content')
    <!-- Header -->
    <header class="w3-container mt-5">
        <h1><i class="fa-solid fa-chart-line"></i>  {{ __('admin.categories.content.0') }}</h1>
    </header>

    <main class="w3-container" id="product-dashboard">
        <h2 class="my-3">{{ __('admin.categories.content.1') }}</h2>

        @if (Session::has('success_status'))
            <p class="mt-5 text-center alert alert-success">{{ Session::get('success_status') }}</p>
        @elseif (Session::has('fail_status'))
            <p class="mt-5 text-center alert alert-danger">{{ Session::get('fail_status') }}</p>
        @endif

        <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
            <thead>
                <tr>
                    <th scope="col">{{ __('admin.categories.content.2') }}</th>
                    <th scope="col">{{ __('admin.categories.content.3') }}</th>
                    <th scope="col">{{ __('admin.categories.content.4') }}</th>
                    <th scope="col">{{ __('admin.categories.content.5') }}</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $category->name }}</td>
                        <td><a class="btn btn-primary"
                                href="{{ route('categories.edit', ['category' => $category]) }}">Edit</a>
                        </td>
                        <td><a class="btn btn-danger"
                                href="{{ route('categories.destroy', ['category' => $category]) }}">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col">{{ __('admin.categories.content.2') }}</th>
                    <th scope="col">{{ __('admin.categories.content.3') }}</th>
                    <th scope="col">{{ __('admin.categories.content.4') }}</th>
                    <th scope="col">{{ __('admin.categories.content.5') }}</th>
                </tr>
            </tfoot>
        </table>

        {{ $categories->links("pagination::bootstrap-4") }}
      
    </main>
@endsection
