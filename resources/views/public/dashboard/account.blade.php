@extends('public.layout.main')

@section('title', __('userdash.account.title'))

@section('content')
    <!-- Account -->
    <section class="my-5 py-5">
        <div class="row container mx-auto">

            @if (Session::has('success_status'))
                <p class="mt-5 text-center alert alert-success">{{ Session::get('success_status') }}</p>
            @elseif (Session::has('fail_status'))
                <p class="mt-5 text-center alert alert-danger">{{ Session::get('fail_status') }}</p>
            @elseif (count($errors) > 0)
                <div class="mt-5 alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="text-center mt-3 pt-3 col-lg-6 col-md-12 col-sm-12">
                <h3 class="font-weight-bold">{{ __('userdash.account.content.others.0') }}</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>{{ __('userdash.account.content.others.1') }}
                        <span>{{ Session::get('user')->name }}</span>
                    </p>
                    <p>{{ __('userdash.account.content.others.2') }}
                        <span>{{ Session::get('user')->email }}</span>
                    </p>
                    <p>{{ __('userdash.account.content.others.3') }}
                        <span>{{ phone(Session::get('user')->phone, 'US') }}</span>
                    </p>
                    <p><a href="#orders" id="order-btn">{{ __('userdash.account.content.others.4') }}</a></p>
                    <p><a href="{{ route('user.logout') }}" id="logout-btn">{{ __('userdash.account.content.others.5') }}</a></p>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <form id="account-form" action="{{ route('user.changepassword') }}" method="post">
                    @csrf
                    <h3>{{ __('userdash.account.content.password_form.0') }}</h3>
                    <hr class="mx-auto">
                    <input type="hidden" name="id" value="{{ Session::get('user')->id }}">
                    <div class="form-group">
                        <label for="">{{ __('userdash.account.content.password_form.1') }}</label>
                        <input type="password" class="form-control" id="account-password" name="password" placeholder="{{ __('userdash.account.content.password_form.1') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('userdash.account.content.password_form.2') }}</label>
                        <input type="password" class="form-control" id="account-confirm-password" name="confirmPassword" placeholder="{{ __('userdash.account.content.password_form.2') }}" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn" id="change-pass-btn" value="{{ __('userdash.account.content.password_form.0') }}">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Orders -->
    <section id="orders" class="orders container my-5 py-3">
        <div class="container mt-2">
            <h2 class="font-weight-bold text-center">{{ __('userdash.account.content.orders.0') }}</h2>
            <hr class="mx-auto">
        </div>

        <table class="mt-5 pt-5">
            <thead>
                <tr>
                    <th scope="col">{{ __('userdash.account.content.orders.1') }}</th>
                    <th scope="col">{{ __('userdash.account.content.orders.2') }}</th>
                    <th scope="col">{{ __('userdash.account.content.orders.3') }}</th>
                    <th scope="col">{{ __('userdash.account.content.orders.4') }}</th>
                    <th scope="col">{{ __('userdash.account.content.orders.5') }}</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 0)
                @foreach ($orders as $order)
                    <tr>
                        <td><span>{{ ++$i }}</span></td>
                        <td><span>$ {{ $order->cost }}</span></td>
                        <td><span>{{ $order->status->name }}</span></td>
                        <td><span>{{ $order->created_at }}</span></td>
                        <td>
                            <a class="btn order-details-btn" href="{{ route('user.orderdetails', ['order' => $order]) }}">
                                {{ __('userdash.account.content.orders.6') }}</a>
                            {{-- <form action="order_details.php" method="post">
                                @csrf
                                <input type="hidden" name="order_status" value="<?= $row['order_status'] ?>">
                                <input type="hidden" name="order_id" value="<?= $row['order_id'] ?>">
                                <input name="order_details_btn" type="submit" value="">
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col">{{ __('userdash.account.content.orders.1') }}</th>
                    <th scope="col">{{ __('userdash.account.content.orders.2') }}</th>
                    <th scope="col">{{ __('userdash.account.content.orders.3') }}</th>
                    <th scope="col">{{ __('userdash.account.content.orders.4') }}</th>
                    <th scope="col">{{ __('userdash.account.content.orders.5') }}</th>
                </tr>
            </tfoot>
        </table>

        {{ $orders->links('pagination::bootstrap-4') }}
    </section>
@endsection
