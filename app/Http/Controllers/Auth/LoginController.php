<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Mail;

class LoginController extends Controller
{
    public function getLoginForm()
    {
        // \Mail::to('huongnvph08496@fpt.edu.vn')->send(app()->make(\App\Mail\DemoSendMail::class));
        return view('auth/login');
    }
    public function login(LoginRequest $request)
    {
        $data = $request->only([
            'email',
            'password',
        ]);

        /*
            * Auth::attempt(['email','password'])
            * return false nếu login thất bại
            * return true nếu login thất bại
        */
        $result = Auth::attempt($data);
        if ($result === false) {
            session()->flash('eror', 'Sai email hoặc mật khẩu');
            return back();
        }
        $user = Auth::user();
        return redirect()->route('admin.users.index');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin.users.index');
    }
}
