<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Hash;
use Illuminate\Http\Request;
use Session;

class AdminDashboardController extends Controller {

    public function index() {
        return view('admin.content.account');
    }

    public function login() {
        return view('admin.content.login', ['disableNavigation' => false]);
    }

    public function logout() {
        Session::forget('admin');
        Session::regenerate();

        return redirect()->route('admin.login');
    }

    public function help() {
        return view('admin.content.help');
    }

    public function accessaccount(Request $request) {
        $this->validate($request, ['email' => 'email|required',
            'password' => 'required']);

        $admin = Admin::all()->where('email', $request->email)->first();

        if ($admin) {
            if (Hash::check($request->password, $admin->password)) {
                Session::regenerate();
                Session::put('admin', $admin);
                return redirect('admin');
            } else {
                return back()->with('fail_status', __('admin.login.fail_status.0'))->withInput($request->except('password'));
            }
        } else {
            return back()->with('fail_status', __('admin.login.fail_status.1'))->withInput($request->except('password'));
        }
    }

}
