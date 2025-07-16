<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Lib\StrFun;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Hash;
use Illuminate\Validation\Rules\Password;
use Session;
use Illuminate\Http\Request;

class UserDashboardController extends Controller {

    public function index() {
        return view('public.dashboard.account', [
            'orders' => Order::where('user_id', Session::get('user')->id)->orderByDesc('status_id')->paginate(10)]);
    }

    public function create(Request $request) {
        $this->validate($request, ['name' => 'required',
            'email' => 'email|required|unique:users',
            'phone' => 'required|numeric|min:6',
            'password' => ['required', Password::min(6)->symbols()
                ->mixedCase()->numbers()->uncompromised()],
            'confirmPassword' => ['required', Password::min(6)->symbols()
                ->mixedCase()->numbers()->uncompromised()]]);

        if ($request->password != $request->confirmPassword) {
            return back()->with('fail_status', __('common.register.fail_status'))->withInput($request->except('password'));
        }

        $user = new User();
        $user->name = StrFun::sanitize($request->name);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();

        Session::regenerate();
        Session::put('user', $user);
        return redirect()->route('user')->with('success_status', __('userdash.account.success_status.0'));
    }

    public function accessaccount(Request $request) {
        $this->validate($request, ['email' => 'email|required',
            'password' => 'required']);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Session::regenerate();
                Session::put('user', $user);
                return redirect()->route('user')->with('success_status', __('userdash.account.success_status.1'));
            } else {
                return back()->with('fail_status', __('common.login.fail_status.0'))->withInput($request->except('password'));
            }
        } else {
            return back()->with('fail_status', __('common.login.fail_status.1'))->withInput($request->except('password'));
        }
    }

    public function orderdetails(Order $order) {
        return view('public.dashboard.orderdetails', ['order' => $order]);
    }

    public function payment(Order $order) {
        return view('public.dashboard.payment', ['order' => $order]);
    }

    public function completepayment(Request $request) {
        $this->validate($request, ['order_id' => 'required',
            'transaction_id' => 'required']);
            
        $order = Order::find($request->order_id);
        $order->status_id = 2;
        $order->update();

        $payment = new Payment();
        $payment->order_id = $order->id;
        $payment->user_id = Session::get('user')->id;
        $payment->transaction_id = $request->transaction_id;
        $payment->save();

        return back()->with('success_status', __('userdash.payment.success_status.1'));
    }

    public function logout() {
        Session::forget('user');
        Session::regenerate();
        return redirect()->route('login');
    }

    public function updatepassword(Request $request) {
        $this->validate($request, ['id' => 'required',
            'password' => ['required', Password::min(6)->symbols()
                ->mixedCase()->numbers()->uncompromised()],
            'confirmPassword' => ['required', Password::min(6)->symbols()
                ->mixedCase()->numbers()->uncompromised()]]);

        if ($request->password != $request->confirmPassword) {
            return back()->with('fail_status', __('userdash.account.fail_status.0'));
        }
        if ($request->id != Session::get('user')->id) {
            return back()->with('fail_status', __('userdash.account.fail_status.1'));
        }

        Session::get('user')->password = bcrypt($request->password);
        Session::get('user')->update();

        return back()->with('success_status', __('userdash.account.success_status.2'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
